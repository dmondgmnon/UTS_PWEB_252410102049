@extends('layouts.app')

@section('title', 'Login')
@section('tanpa_navbar', 'ya')

@section('content')
    <div style="max-width: 380px; margin: 40px auto 0;">
        <h1>Masuk</h1>
        <p>Silakan masukkan username dan password untuk melihat data bahan baku.</p>

        @error('login')
            <div class="galat">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('masuk') }}">
            @csrf

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" autofocus>
            @error('username')
                <div class="galat">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            @error('password')
                <div class="galat">{{ $message }}</div>
            @enderror

            <button type="submit" class="tombol">Masuk</button>
        </form>
    </div>
@endsection
