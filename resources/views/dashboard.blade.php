@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Selamat datang, {{ $username }}</h1>
    <p>Halaman ini digunakan untuk melihat daftar bahan baku yang tersedia di gudang restoran.</p>
    <a class="tombol" href="{{ route('pengelolaan', ['username' => $username]) }}">Lihat Bahan Baku</a>
@endsection
