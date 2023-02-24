<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectAction;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->username != Auth::user()->username ? abort(404) : null;
        $id = $user->id;
        return view('pages.project.index', compact('id'));
    }

    public function func(Request $request)
    {

        if (!isset($request->status)) return response()->json(['error' => 'Gecersiz istek.'], 400);
        switch ($request->status) {
            case 'create-project':
                //validate
                $request->validate([
                    'title' => 'required|string|max:255',
                    'description' => 'required',
                    'category' => 'required|string|max:255',
                ], [
                    'title.required' => 'Proje adı boş bırakılamaz.',
                    'title.string' => 'Proje adı geçersiz.',
                    'title.max' => 'Proje adı 255 karakterden uzun olamaz.',
                    'description.required' => 'Proje açıklaması boş bırakılamaz.',
                    'category.required' => 'Proje kategorisi boş bırakılamaz.',
                    'category.string' => 'Proje kategorisi geçersiz.',
                    'category.max' => 'Proje kategorisi 255 karakterden uzun olamaz.',
                ]);

                $results = [
                    'success' => [],
                    'error' => []
                ];

                //try catch with error validation messages
                try {
                    $project = new Project();
                    $project->title = $request->title;
                    //slug başlığın ilk 5 karakteri + rastgele 4 haneli sayı
                    $project->slug = Str::slug($request->title, '-') . "-" . rand(1000, 9999);
                    $project->category = $request->category;
                    $project->description = $request->description;
                    $project->user_id = Auth::user()->id;
                    $project->color = $request->color;
                    $project->deadline = $request->deadline;
                    $project->invite_code = "BIO-" . rand(1000, 9999) . "-BLOG";
                    if ($request->is_public == "1") {
                        $project->is_public = true;
                    }
                    $project->save();

                    $projectAction = new ProjectAction();
                    $projectAction->user_id = Auth::user()->id;
                    $projectAction->project_id = $project->id;
                    $projectAction->save();
                } catch (\Exception $e) {
                    $results['error'][] = $e->getMessage();
                }

                if (count($results['error']) > 0) {
                    return response()->json(['error' => $results['error']], 400);
                }

                $username = Auth::user()->username;

                return response()->json(['success' => 'Proje oluşturuldu.', 'slug' => $project->slug, 'username' => $username], 200);
                break;
            case 'create-todo':
                //validate
                $request->validate([
                    'title' => 'required|string|max:255',
                    'project_id' => 'required|integer',
                ], [
                    'title.required' => 'Yapılacak adı boş bırakılamaz.',
                    'title.string' => 'Yapılacak adı geçersiz.',
                    'title.max' => 'Yapılacak adı 255 karakterden uzun olamaz.',
                    'project_id.required' => 'Proje id boş bırakılamaz.',
                    'project_id.integer' => 'Proje id geçersiz.',
                ]);

                $results = [
                    'success' => [],
                    'error' => []
                ];

                //try catch with error validation messages
                try {
                    $project = Project::where('id', $request->project_id)->firstOrFail();
                    $project->user_id != Auth::user()->id ? abort(404) : null;
                    $todo = new Todo();
                    $todo->title = $request->title;
                    $todo->slug = Str::slug($request->title, '-') . "-" . rand(1000, 9999);
                    $todo->user_id = Auth::user()->id;
                    $todo->project_id = $request->project_id;
                    $todo->save();
                } catch (\Exception $e) {
                    $results['error'][] = $e->getMessage();
                }
                if (count($results['error']) > 0) {
                    return response()->json(['error' => $results['error']], 400);
                }
                return response()->json(['success' => 'Yapılacak oluşturuldu.', 'slug' => $project->slug], 200);
                break;
                case 'invite';
                return response()->json(['success' => true, 'data' => view('pages.project.includes.project-invite')->render()], 200);
                break;
                case 'invite-control';
                $code = $request->invite_code;
                $user_id = Auth::user()->id;
                $project = Project::where('invite_code', $code)->firstOrFail();
                $projectAction = new ProjectAction();
                $projectAction->user_id = $user_id;
                $projectAction->project_id = $project->id;
                $projectAction->save();
                return redirect()->back();
                break;
            default:
                return response()->json(['error' => 'Gecersiz istek.'], 400);
                break;
        }
    }

    public function show($username, $slug)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->username != Auth::user()->username ? abort(404) : null;
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->user_id != Auth::user()->id ? abort(404) : null;
        // with model active, star, completed count
        $todoAction = Todo::where('user_id', Auth::user()->id)->first();

        if ($todoAction) {
            $active =  $todoAction->activeCount($project->id);
            $star =  $todoAction->starCount($project->id);
            $completed =  $todoAction->completedCount($project->id);
            $total = $star + $active + $completed;
            //totalın 0 olması durumunda 1 yaparak 0'a bölme hatasını önlemek için
            $total == 0 ? $total = 1 : null;
            //toplamın yüzde kaçı tamamlanmış
            $completedPercent = ($completed * 100) / $total;
        } else {
            $completedPercent = 0;
        }
        // todos send to view - with acitve, star, completed
        $todos = Todo::where('project_id', $project->id)->where('user_id', Auth::user()->id)->where('status', 'active')->get();
        $todostar = Todo::where('project_id', $project->id)->where('user_id', Auth::user()->id)->where('status', 'star')->get();
        $todocompleted = Todo::where('project_id', $project->id)->where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        return view('pages.project.show', compact('project', 'todos', 'todostar', 'todocompleted', 'completedPercent'));
    }

    public function list($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        // $user->username != Auth::user()->username ? abort(404) : null;
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('pages.project.list', compact('projects'));
    }

    public function invite(Request $request){
        dd($request->all());
    }
}
