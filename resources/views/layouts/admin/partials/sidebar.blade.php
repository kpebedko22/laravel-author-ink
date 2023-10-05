<aside class="bg-primary-400 fixed h-screen w-64 hidden sm:block border-r text-dark-500 shadow-2xl">
    <div class="py-2 px-6 h-16 flex justify-center items-center">
        <a href="{{ route('admin.dashboard.index') }}"
           class="text-3xl font-semibold text-dark-900"
        >{{ config('app.name') }}</a>
    </div>

    <nav class="text-base font-semibold pt-3 px-4">
        <a href="{{ route('admin.dashboard.index') }}"
           class="flex rounded-xl items-center transition-all py-3 pl-6 mt-1 hover:bg-primary-700 hover:text-dark-900 {{ request()->is('admin/dashboard*') ? 'bg-primary-700 text-dark-900' : '' }}"
        >
            <x-heroicon-o-home class="w-5 h-5 mr-2"/>
            Dashboard
        </a>
        <a href="{{ route('admin.authors.index') }}"
           class="flex rounded-xl items-center transition-all py-3 pl-6 mt-1 hover:bg-primary-700 hover:text-dark-900 {{ request()->is('admin/authors*') ? 'bg-primary-700 text-dark-900' : '' }}"
        >
            <x-heroicon-o-users class="w-5 h-5 mr-2"/>
            Authors
        </a>
        <a href="{{ route('admin.books.index') }}"
           class="flex rounded-xl items-center transition-all py-3 pl-6 mt-1 hover:bg-primary-700 hover:text-dark-900 {{ request()->is('admin/books*') ? 'bg-primary-700 text-dark-900' : '' }}"
        >
            <x-heroicon-o-book-open class="w-5 h-5 mr-2"/>
            Books
        </a>
    </nav>
</aside>
