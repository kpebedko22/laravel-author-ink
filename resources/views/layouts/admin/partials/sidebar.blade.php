<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('admin.dashboard.index') }}"
           class="text-white text-3xl font-semibold uppercase hover:text-gray-300"
        >Admin</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('admin.dashboard.index') }}"
           class="flex items-center transition-all text-white py-4 pl-6 nav-item {{ request()->is('admin/dashboard*') ? 'active-nav-link' : '' }}"
        >
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('admin.authors.index') }}"
           class="flex items-center transition-all text-white py-4 pl-6 nav-item {{ request()->is('admin/authors*') ? 'active-nav-link' : '' }}"
        >
            <i class="fas fa-sticky-note mr-3"></i>
            Authors
        </a>
        <a href="{{ route('admin.books.index') }}"
           class="flex items-center transition-all text-white py-4 pl-6 nav-item {{ request()->is('admin/books*') ? 'active-nav-link' : '' }}"
        >
            <i class="fas fa-table mr-3"></i>
            Books
        </a>
    </nav>
</aside>
