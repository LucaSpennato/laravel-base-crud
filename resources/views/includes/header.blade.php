<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin') }}">Comics!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin') ? 'active text-primary' : '' }}" aria-current="page" href="{{ route('admin') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('comic.index') ? 'active text-primary' : '' }}" href="{{ route('comic.index') }}">Comics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('') ? 'active text-warning' : '' }}">Disabled</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>