<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->username != Auth::user()->username ? abort(404) : null;
        $todos = Todo::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        return view('pages.project.show', ['todos' => $todos]);
    }

    public function func(Request $request)
    {
        if (!isset($request->status)) return response()->json(['error' => 'Gecersiz istek.'], 400);
        switch ($request->status) {
            case 'todo-edit':
                 $id = $request->todo_id;
                $projec_id = $request->project_id;
                $todo = Todo::where('id', $id)->firstOrFail();
                $project = Project::where('id', $projec_id)->firstOrFail();
                return response()->json(['success' => true, 'data', view('pages.project.includes.todo-edit', ['todo' => $todo, 'project' => $project])->render()], 200);
                break;
            case 'todo-update':
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
                try {
                    $todo = Todo::where('id', $request->todo_id)->firstOrFail();
                    $todo->title = $request->title;
                    $todo->description = $request->description;
                    $todo->category = $request->category;
                    $todo->color = $request->color;
                    $todo->deadline = $request->deadline;
                    $todo->save();
                    $results['success'][] = 'Todo başarıyla güncellendi.';
                } catch (\Exception $e) {
                    $results['error'][] = 'Todo güncellenirken bir hata oluştu.';
                }

                return response()->json($results);
                break;
            case 'delete-todo':
                //validate
                $request->validate([
                    'id' => 'required|integer',
                ], [
                    'id.required' => 'Todo id boş bırakılamaz.',
                    'id.integer' => 'Todo id geçersiz.',
                ]);

                $results = [
                    'success' => [],
                    'error' => []
                ];

                //try catch with error validation messages
                try {
                    $todo = Todo::where('id', $request->id)->firstOrFail();
                    $todo->delete();
                    $results['success'][] = 'Todo başarıyla silindi.';
                } catch (\Exception $e) {
                    $results['error'][] = 'Todo silinirken bir hata oluştu.';
                }

                return response()->json($results);
                break;
                case 'star';
                $id = $request->id;
                $todo = Todo::where('id', $id)->firstOrFail();
                $todo->status == 'active' ? $todo->status = 'star' : $todo->status = 'active';
                $todo->save();
                return response()->json(['success' => true, 'data' => $todo->status], 200);
                break;
                case 'completed';
                $id = $request->id;
                $todo = Todo::where('id', $id)->firstOrFail();
                $todo->status == 'active' ? $todo->status = 'completed' : $todo->status = 'active';
                $todo->save();
                return response()->json(['success' => true, 'data' => $todo->status], 200);
                break;
                case 'remove';
                $id = $request->id;
                //delete todo
                $todo = Todo::where('id', $id)->firstOrFail();
                $todo->delete();
                return response()->json(['success' => true], 200);
                break;
                case 'todo-status';
                $id = $request->id;
                $todo = Todo::where('id', $id)->firstOrFail();
                $todo->status == 'active' ? $todo->status = 'completed' : $todo->status = 'active';
                $todo->save();
                return response()->json(['success' => true, 'data' => $todo->status], 200);
                break;
            default:
                return response()->json(['error' => 'Gecersiz istek.'], 400);
                break;
        }
    }
}
