<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
                } catch (\Exception $e) {
                    $results['error'][] = $e->getMessage();
                }

                if (count($results['error']) > 0) {
                    return response()->json(['error' => $results['error']], 400);
                }

                return response()->json(['success' => 'Proje oluşturuldu.', 'slug' => $project->slug], 200);
                break;
            case 'load-docs':
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
        return view('pages.project.show', compact('project'));
    }
}
