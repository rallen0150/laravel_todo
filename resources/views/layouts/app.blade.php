<!-- This is essentially a "base" template for all html files to have the same starting point (basically just a similar html starting) -->
<html>
  <head>
    <title>Todo App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/tasks">Laravel Todo App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        @auth
          <li class="nav-item active">
            <a class="nav-link" href="/tasks">All Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tasks/create">New Task</a>
          </li>
          <li class="nav-item menu-items" style="right: 0; position:absolute;">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">                
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Logout</span>
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li> 
        @endauth
        @guest
          <li class="nav-item active">
            <a class="nav-link" href="/">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
        @endguest
        </ul>
      </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>