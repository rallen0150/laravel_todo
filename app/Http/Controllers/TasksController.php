<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index() {
        // $tasks = Task::orderBy('completed_at')
        //     ->orderBy('id', 'DESC')
        //     ->get();

        // paginate the authorized user's tasks with 5 per page
        $tasks = Auth::user()
            ->tasks()
            ->orderBy('is_complete')
            ->orderByDesc('created_at')
            ->paginate(5);

        // return dd($tasks);

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        // request()->validate([
        //     'description' => 'required|max:255',
        // ]);

        // Task::create([
        //     'description' => request('description'),
        // ]);

        // validate the given request
        $data = $this->validate($request, [
            'description' => 'required|max:255',
        ]);

        // create a new incomplete task with the given title
        Auth::user()->tasks()->create([
            // 'title' => $data['title'],
            // 'is_complete' => false,
            'description' => request('description'),
        ]);

        return redirect('/');
    }

    public function update($id) {
        $task = Task::where('id', $id)->first();

        $task->completed_at = now();
        $task->save();

        return redirect('/');
    }

    // Delete a task
    public function delete($id) {
        $task = Task::where('id', $id)->first();

        $task->delete();

        return redirect('/');
    }
}