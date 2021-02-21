<!-- This is essentially a "base" template for all html files to have the same starting point (basically just a similar html starting) -->
<html>
  <head>
    <title>Todo App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">Laravel Todo App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">All Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tasks/create">New Task</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>