<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href=" {{ url('/') }} ">Authors & Books</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if (Request::path() === '/') active @endif" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::path() === 'admin/account') active @endif" href="{{ route('admin.authentication.account') }}">Admin-panel</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if (Request::path() === 'admin/authors') active @endif" href="{{ route('admin.authors.index') }}">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::path() === 'admin/books') active @endif" href="{{ route('admin.books.index') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/sign-out') }}">Sign Out</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
