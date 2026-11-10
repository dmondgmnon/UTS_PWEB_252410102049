@props(['username' => 'Tamu'])

<header class="navbar">
    <a class="brand" href="{{ route('dashboard', ['username' => $username]) }}">Gudang Bahan Baku</a>
    <nav>
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="{{ request()->routeIs('dashboard') ? 'aktif' : '' }}">Dashboard</a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="{{ request()->routeIs('pengelolaan') ? 'aktif' : '' }}">Pengelolaan</a>
        <a href="{{ route('profile', ['username' => $username]) }}"
           class="{{ request()->routeIs('profile') ? 'aktif' : '' }}">Profile</a>
        <a href="{{ route('login') }}">Keluar</a>
    </nav>
</header>
