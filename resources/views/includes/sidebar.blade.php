<ul class="nav nav-pills nav-fill bg-secondary">
  <li class="nav-item w-100">
      <a class="nav-link {{ Request::path() === 'play' ? 'active' : '' }}" href="{{ url('/play') }}">Play</a>
  </li>
  <li class="nav-item w-100">
      <a class="nav-link {{ Request::path() === 'my-team' ? 'active' : '' }}" href="{{ url('/my-team') }}">My Team</a>
  </li>
  <li class="nav-item w-100">
      <a class="nav-link disabled" href="#">Packs</a>
  </li>
</ul>