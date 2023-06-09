<header
  class="d-flex px-4 py-3 flex-wrap align-items-center justify-content-center justify-content-md-between border-bottom bg-light"
>
  <a
    href="/"
    class="d-flex fs-2 align-items-center col-md-3 mb-4 mb-md-0 text-dark text-decoration-none"
  >
    <i class="fa-solid fa-blog"></i>
  </a>
  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li>
      <div class="input-group input-group-sm">
        <div class="input-group-prepend">
          <span
            class="input-group-text text-muted fw-bold"
            id="inputGroup-sizing-sm"
            >Blog</span
          >
        </div>
        <input
          type="text"
          id="search"
          onkeyup="search_blog()"
          class="form-control"
          placeholder="Jump to.."
          aria-label="Jump to.."
          aria-describedby="inputGroup-sizing-sm"
        />
      </div>
    </li>
  </ul>
  <div class="col-md-3 text-end">
    @guest
    <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2 mb-2"
      >Hai, Tamu</a
    >
    @else
    <div
      class="nama fs-6 fw-bold d-flex align-items-center justify-content-center"
    >
      <span>{{ Auth::user()->name }}</span>
      <a
        href="#"
        class="d-block link-dark text-decoration-none dropdown-toggle ms-3"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/f/f4/User_Avatar_2.png"
          alt="User Avatar"
          width="32"
          height="32"
          class="rounded-circle"
        />
      </a>
      <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item text-muted">Account</a></li>
        <li>
          <a
            class="dropdown-item"
            href="#"
            class="btn btn-outline-danger ms-2 mb-2"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
            >Sign out</a
          >
        </li>
        <form
          action="{{route('auth.logout')}}"
          id="logout-form"
          method="POST"
          style="display: none"
        >
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
      </ul>
    </div>
    @endguest
  </div>
</header>
