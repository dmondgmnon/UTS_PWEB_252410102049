<nav class="bg-emerald-800 text-white">
    <div class="max-w-6xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-3">
        <span class="font-bold text-lg tracking-wide">🍳 StokDapur</span>

        <div class="flex flex-wrap items-center gap-1 text-sm">
            <a href="{{ route('dashboard') }}"
               class="px-3 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-emerald-950 font-semibold' : 'hover:bg-emerald-700' }}">
                Dashboard
            </a>
            <a href="{{ route('pengelolaan') }}"
               class="px-3 py-2 rounded-md {{ request()->routeIs('pengelolaan') ? 'bg-emerald-950 font-semibold' : 'hover:bg-emerald-700' }}">
                Pengelolaan
            </a>
            <a href="{{ route('profile') }}"
               class="px-3 py-2 rounded-md {{ request()->routeIs('profile') ? 'bg-emerald-950 font-semibold' : 'hover:bg-emerald-700' }}">
                Profile
            </a>

            <form action="{{ route('logout') }}" method="POST" class="ml-2">
                @csrf
                <button type="submit" class="px-3 py-2 rounded-md bg-amber-500 text-emerald-950 font-semibold hover:bg-amber-400">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</nav>
