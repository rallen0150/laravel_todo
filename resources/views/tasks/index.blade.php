@extends('layouts.app')

@section('style')
  <style>
    .header {
      width: 100%;
      padding-bottom: 15px;
    }

    h1 {
      margin: 0;
      display: inline-block;
      left: 43%;
      position: relative;
    }

    #new-task-btn {
      float: right;
      width: 25%;
    }

  </style>
@endsection

@section('content')
  <div style="margin-top: 40px; margin-bottom: 40px;">
    @auth
      <div class="header">
        <h1>Task List</h1>
        <a href="/tasks/create" class="btn btn-primary btn-lg btn-block" id="new-task-btn">New Task</a>
      </div>
      <div class="row">
        @foreach($tasks as $task)
          <div class="col-sm-6">
            <div class="card text-center @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
              <div class="card-header">
                {{ $task->title }}
              </div>
              <div class="card-body">
                <p>
                  {{ $task->description}}
                </p> 
                @if(!$task->isCompleted())
                  <form action="/tasks/{{ $task->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button class="btn btn-light btn-block" input="submit">Complete</button>
                  </form>
                @else
                  <form action="/tasks/{{ $task->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-block" input="submit">Delete</button>
                  </form>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <h1>You are not allowed to view the tasks</h1>
    @endguest
  </div>
@endsection