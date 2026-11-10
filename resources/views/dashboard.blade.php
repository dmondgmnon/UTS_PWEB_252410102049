@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-3xl font-bold">Halo, {{ $username }}! 👋</h1>
<p class="text-stone-500 mt-1 mb-8">Berikut ringkasan kondisi gudang bahan baku hari ini.</p>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-10">
    <div class="bg-white border border-stone-200 rounded-xl p-5">
        <p class="text-sm text-stone-500">Total Jenis Bahan</p>
        <p class="text-3xl font-bold text-emerald-700 mt-1">{{ $total }}</p>
    </div>
    <div class="bg-white border border-stone-200 rounded-xl p-5">
        <p class="text-sm text-stone-500">Stok Menipis</p>
        <p class="text-3xl font-bold text-red-600 mt-1">{{ count($menipis) }}</p>
    </div>
    <div class="bg-white border border-stone-200 rounded-xl p-5">
        <p class="text-sm text-stone-500">Jumlah Kategori</p>
        <p class="text-3xl font-bold text-amber-600 mt-1">{{ $jumlahKategori }}</p>
    </div>
</div>

<h2 class="text-xl font-bold mb-4">⚠️ Perlu Segera Dipesan Ulang</h2>
<div class="bg-white border border-stone-200 rounded-xl divide-y divide-stone-100">
    @forelse ($menipis as $b)
        <div class="flex flex-wrap items-center justify-between gap-2 p-4">
            <div>
                <p class="font-semibold">{{ $b->nama }}</p>
                <p class="text-sm text-stone-500">Supplier: {{ $b->supplier }}</p>
            </div>
            <p class="text-sm">
                Sisa <b class="text-red-600">{{ $b->stok }} {{ $b->satuan }}</b>
                (min. {{ $b->minimum }} {{ $b->satuan }})
            </p>
        </div>
    @empty
        <p class="p-4 text-stone-500">Semua stok dalam kondisi aman.</p>
    @endforelse
</div>
@endsection
