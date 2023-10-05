<!-- Desktop Header -->
<header class="pl-64 w-screen items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-1/2"></div>
    <div class="relative w-1/2 flex justify-end">
        <div x-data="{ isOpen: false }"
             @click.outside="isOpen = false"
        >
            <button @click="isOpen = !isOpen"
                    class="relative flex justify-center items-center z-10 w-12 h-12 rounded-full overflow-hidden border border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none"
            >
                <x-heroicon-o-user class="w-8 h-8"/>
            </button>

            <template x-if="isOpen">
                <div
                    class="absolute right-0 w-44 bg-white rounded-lg shadow-lg py-2 px-1 mt-0.5 border border-gray-300"
                >
                    <a href="#" class="flex px-4 py-2 rounded-xl transition-all text-dark-500 bg-white hover:bg-primary-700 hover:text-dark-700"
                    >Account</a>
                    <a href="#" class="flex px-4 py-2 rounded-xl transition-all text-dark-500 bg-white hover:bg-primary-700 hover:text-dark-700"
                    >Sign Out</a>
                </div>
            </template>
        </div>
    </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-white py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.dashboard.index') }}"
           class="text-dark-700 text-3xl font-semibold hover:text-gray-300"
        >{{ config('app.name') }}</a>

        <button @click="isOpen = !isOpen"
                class="text-dark-700 text-3xl focus:outline-none"
        >
            <x-heroicon-o-bars-3 class="w-5 h-5 mr-1" x-show="!isOpen"/>
            <x-heroicon-o-x-mark class="w-5 h-5 mr-1" x-show="isOpen"/>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex' : 'hidden'"
         class="flex flex-col pt-4"
    >
        <a href="{{ route('admin.dashboard.index') }}"
           class="flex rounded-xl transition-all items-center text-dark-700 opacity-75 hover:opacity-100 py-2 pl-4 {{ request()->is('admin/dashboard*') ? 'bg-primary-700 text-dark-900' : '' }}"
        >
            <x-heroicon-o-home class="w-5 h-5 mr-2"/>
            Dashboard
        </a>
        <a href="{{ route('admin.authors.index') }}"
           class="flex rounded-xl transition-all items-center text-dark-700 opacity-75 hover:opacity-100 py-2 pl-4 {{ request()->is('admin/authors*') ? 'bg-primary-700 text-dark-900' : '' }}"
        >
            <x-heroicon-o-users class="w-5 h-5 mr-2"/>
            Authors
        </a>
        <a href="{{ route('admin.books.index') }}"
           class="flex rounded-xl transition-all items-center text-dark-700 opacity-75 hover:opacity-100 py-2 pl-4 {{ request()->is('admin/books*') ? 'bg-primary-700 text-dark-900' : '' }}">
            <x-heroicon-o-book-open class="w-5 h-5 mr-2"/>
            Books
        </a>
        <a href="#" class="flex items-center text-dark-700 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sign-out-alt mr-3"></i>
            Sign Out
        </a>
    </nav>
</header>
