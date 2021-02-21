@extends('layouts.app')

@section('content')
  @auth
    <h1>New Task</h1>
    @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="/tasks">
      @csrf
      <div class="form-group">
        <label for="description">Task Description</label>
        <input class="form-control" name="description" />
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Create Task</button>
      </div>
    </form>
  @endauth
  @guest
    <h1>You are not allowed to add a task</h1>
  @endguest
@endsection