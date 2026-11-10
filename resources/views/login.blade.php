@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto mt-8">
    <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-8">
        <p class="text-4xl mb-2">🍳</p>
        <h1 class="text-2xl font-bold text-emerald-800">StokDapur</h1>
        <p class="text-stone-500 text-sm mb-6">Masuk untuk mengelola gudang bahan baku restoran.</p>

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium mb-1">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                       class="w-full rounded-md border border-stone-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input type="password" id="password" name="password"
                       class="w-full rounded-md border border-stone-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-emerald-700 text-white font-semibold py-2.5 rounded-md hover:bg-emerald-800">
                Masuk
            </button>
        </form>

        <p class="text-xs text-stone-400 mt-4 text-center">Demo: isi username bebas, password <b>123</b></p>
    </div>
</div>
@endsection
