@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<h1 class="text-3xl font-bold mb-6">Profil Pengguna</h1>

<div class="max-w-lg bg-white border border-stone-200 rounded-xl p-6 space-y-5">
    <div class="flex items-center gap-4">
        <div class="w-16 h-16 rounded-full bg-emerald-700 text-white flex items-center justify-center text-2xl font-bold">
            {{ strtoupper(substr($username, 0, 1)) }}
        </div>
        <div>
            <p class="text-xl font-semibold">{{ $username }}</p>
            <p class="text-sm text-stone-500">{{ $role }}</p>
        </div>
    </div>

    <hr class="border-stone-200">

    <dl class="space-y-3 text-sm">
        <div class="flex justify-between">
            <dt class="text-stone-500">Username</dt>
            <dd class="font-medium">{{ $username }}</dd>
        </div>
        <div class="flex justify-between">
            <dt class="text-stone-500">Role</dt>
            <dd class="font-medium">{{ $role }}</dd>
        </div>
        <div class="flex justify-between">
            <dt class="text-stone-500">Bahan yang dikelola</dt>
            <dd class="font-medium">{{ $total }} jenis</dd>
        </div>
    </dl>
</div>
@endsection
