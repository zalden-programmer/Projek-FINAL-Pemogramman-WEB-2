<nav x-data="{ open: false }"
    class="bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-md sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('dashboard') }}"
                        style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none;">
                        <div
                            style="background-color: #4f46e5; color: white; border-radius: 8px; padding: 0.5rem; display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; flex-shrink: 0;">
                            <i class="bi bi-book-fill" style="font-size: 1.1rem;"></i>
                        </div>
                        <span style="font-size: 1.25rem; font-weight: 700; color: #1f2937;">Perpustakaan</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ml-10 sm:flex sm:items-center">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition
                        {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i class="bi bi-speedometer2"></i>
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('buku.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition
                        {{ request()->routeIs('buku.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i class="bi bi-book"></i>
                        {{ __('Buku') }}
                    </a>
                    <a href="{{ route('anggota.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition
                        {{ request()->routeIs('anggota.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i class="bi bi-people"></i>
                        {{ __('Anggota') }}
                    </a>
                    <a href="{{ route('transaksi.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition
                        {{ request()->routeIs('transaksi.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i class="bi bi-arrow-left-right"></i>
                        {{ __('Transaksi') }}
                    </a>
                    <a href="{{ route('laporan.index') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium transition
                        {{ request()->routeIs('laporan.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <i class="bi bi-file-earmark-text"></i>
                        {{ __('Laporan') }}
                    </a>
                </div>
            </div>

            <!-- Search Box -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <form action="{{ route('search') }}" method="GET"
                    style="display: flex; align-items: center; gap: 0.5rem; border: 1px solid #d1d5db; background-color: #f9fafb; border-radius: 6px; padding: 0.5rem 0.75rem; width: 280px;">
                    <i class="bi bi-search" style="color: #9ca3af; font-size: 0.875rem; flex-shrink: 0;"></i>
                    <input type="text" name="q" placeholder="Cari buku, anggota, transaksi..."
                        value="{{ request('q') }}" autocomplete="off"
                        style="border: none; background: transparent; outline: none; font-size: 0.875rem; width: 100%; padding: 0;">
                </form>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-3 py-2 rounded-full text-sm font-medium text-gray-600 hover:bg-gray-50 focus:outline-none transition">
                            <div
                                class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-sm font-semibold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="bi bi-person-circle me-1"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
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

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="w-12 h-12 flex items-center justify-center rounded-xl
               text-gray-500 hover:bg-indigo-50 hover:text-indigo-600
               transition duration-200 focus:outline-none">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
            <form action="{{ route('search') }}" method="GET"
                style="display: flex; align-items: center; gap: 0.5rem; border: 1px solid #d1d5db; background-color: #f9fafb; border-radius: 6px; padding: 0.5rem 0.75rem; width: 100%;">
                <i class="bi bi-search" style="color: #9ca3af; font-size: 0.875rem; flex-shrink: 0;"></i>
                <input type="text" name="q" placeholder="Cari buku, anggota, transaksi..."
                    value="{{ request('q') }}" autocomplete="off"
                    style="border: none; background: transparent; outline: none; font-size: 0.875rem; width: 100%; padding: 0;">
            </form>
        </div>

        <div class="pt-3 pb-3 space-y-1 px-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-speedometer2"></i> {{ __('Dashboard') }}
            </a>
            <a href="{{ route('buku.index') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('buku.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-book"></i> {{ __('Buku') }}
            </a>
            <a href="{{ route('anggota.index') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('anggota.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-people"></i> {{ __('Anggota') }}
            </a>
            <a href="{{ route('transaksi.index') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('transaksi.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-arrow-left-right"></i> {{ __('Transaksi') }}
            </a>
            <a href="{{ route('laporan.index') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-md text-base font-medium transition
                {{ request()->routeIs('laporan.*') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="bi bi-file-earmark-text"></i> {{ __('Laporan') }}
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4 gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-sm font-semibold">
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

                <!-- Authentication -->
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
