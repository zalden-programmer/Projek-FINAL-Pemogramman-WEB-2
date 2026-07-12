<nav x-data="{ open: false, searchOpen: false }" class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="shrink-0 flex items-center gap-2 mt-1">
                <a href="{{ route('dashboard') }}"
                    style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none;">
                    <div
                        style="background-color: #4f46e5; color: white; border-radius: 8px; padding: 0.5rem; display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; flex-shrink: 0;">
                        <i class="bi bi-book-fill" style="font-size: 1.1rem;"></i>
                    </div>
                    <span style="font-size: 1.25rem; font-weight: 700; color: #1f2937;">Perpustakaan</span>
                </a>
            </div>

            <!-- Navigation Pill Menu-->
            <div class="hidden sm:flex bg-gray-200 rounded-full p-1 gap-1 mt-1">
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                    {{ request()->routeIs('dashboard') ? 'bg-white text-black-900 shadow-sm' : 'text-gray-500 hover:text-gray-800' }}">
                    Dashboard
                </a>
                <a href="{{ route('buku.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                    {{ request()->routeIs('buku.*') ? 'bg-white text-black-900 shadow-sm' : 'text-gray-500 hover:text-gray-800' }}">
                    Buku
                </a>
                <a href="{{ route('anggota.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                    {{ request()->routeIs('anggota.*') ? 'bg-white text-black-900 shadow-sm' : 'text-gray-500 hover:text-gray-800' }}">
                    Anggota
                </a>
                <a href="{{ route('transaksi.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                    {{ request()->routeIs('transaksi.*') ? 'bg-white text-black-900 shadow-sm' : 'text-gray-500 hover:text-gray-800' }}">
                    Transaksi
                </a>
                <a href="{{ route('laporan.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                    {{ request()->routeIs('laporan.*') ? 'bg-white text-black-900 shadow-sm' : 'text-gray-500 hover:text-gray-800' }}">
                    Laporan
                </a>
            </div>

            <!-- Right: Search + User -->
            <div class="hidden sm:flex items-center gap-3 mt-1">
                
                <!-- Expandable Search -->
                <form action="{{ route('search') }}" method="GET" class="flex items-center">
                    <input type="text" name="q" x-show="searchOpen"
                        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" @click.away="searchOpen = false"
                        placeholder="Cari buku, anggota, transaksi..." autocomplete="off"
                        class="border border-gray-200 bg-gray-50 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        style="width: 220px; padding: 8px 14px; margin-right: 8px;">

                    <button type="button"
                        @click="searchOpen = !searchOpen; if (searchOpen) { $nextTick(() => $refs.searchInput?.focus()) }"
                        class="w-9 h-9 rounded-full flex items-center justify-center text-gray-500 hover:bg-gray-100 transition">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-1 focus:outline-none">
                            <div class="rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-sm font-semibold"
                                style="width: 36px; height: 36px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="bi bi-person-circle me-1"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden border-t border-gray-100">

        <!-- Mobile Search -->
        <div class="px-4 pt-3">
            <form action="{{ route('search') }}" method="GET" class="relative">
                <i class="bi bi-search"
                    style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 14px; pointer-events: none;"></i>
                <input type="text" name="q" placeholder="Cari buku, anggota, transaksi..." autocomplete="off"
                    class="w-full border border-gray-200 bg-gray-50 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    style="padding: 10px 14px 10px 38px;">
            </form>
        </div>

        <div class="pt-3 pb-3 space-y-1 px-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a href="{{ route('buku.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('buku.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-book"></i> Buku
            </a>
            <a href="{{ route('anggota.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('anggota.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-people"></i> Anggota
            </a>
            <a href="{{ route('transaksi.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('transaksi.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-arrow-left-right"></i> Transaksi
            </a>
            <a href="{{ route('laporan.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('laporan.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-file-earmark-text"></i> Laporan
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4 gap-3">
                <div class="rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-sm font-semibold"
                    style="width: 40px; height: 40px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-2">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="bi bi-person-circle me-1"></i> {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="bi bi-box-arrow-right me-1"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
