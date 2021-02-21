<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index() {
        // grab the authorized user's tasks and order by oldest created
        $tasks = Auth::user()
            ->tasks()
            ->orderBy('created_at', 'ASC')
            ->get();

        // return dd($tasks);

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $data = $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:255',
        ]);

        // create a new incomplete task with the given title
        Auth::user()->tasks()->create([
            'title' => request('title'),
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