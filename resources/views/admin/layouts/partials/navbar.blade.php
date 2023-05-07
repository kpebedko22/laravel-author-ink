<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href=" {{ route('admin.dashboard.index') }} ">Authors & Books</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}"
                           href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/authors*') ? 'active' : '' }}"
                           href="{{ route('admin.authors.index') }}">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/books*') ? 'active' : '' }}"
                           href="{{ route('admin.books.index') }}">Books</a>
                    </li>
                @endauth
            </ul>

            <form method="POST"
                  action="{{ route('admin.auth.logout') }}"
                  class="d-flex"
            >
                @csrf
                @method('POST')
                <button class="btn btn-outline-success" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>
