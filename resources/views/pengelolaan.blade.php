@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<h1 class="text-3xl font-bold mb-1">Pengelolaan Bahan Baku</h1>
<p class="text-stone-500 mb-6">Daftar seluruh bahan baku yang tersimpan di gudang.</p>

<form action="{{ route('pengelolaan') }}" method="GET" class="flex gap-2 mb-5">
    <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari nama atau kategori..."
           class="flex-1 max-w-sm rounded-md border border-stone-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
    <button type="submit" class="bg-emerald-700 text-white px-4 rounded-md hover:bg-emerald-800">Cari</button>
</form>

<div class="overflow-x-auto bg-white border border-stone-200 rounded-xl">
    <table class="w-full text-sm text-left">
        <thead class="bg-stone-100 text-stone-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Nama Bahan</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Stok</th>
                <th class="px-4 py-3">Minimum</th>
                <th class="px-4 py-3">Supplier</th>
                <th class="px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @forelse ($bahan as $b)
                <tr class="hover:bg-stone-50">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 font-medium">{{ $b->nama }}</td>
                    <td class="px-4 py-3">{{ $b->kategori }}</td>
                    <td class="px-4 py-3">{{ $b->stok }} {{ $b->satuan }}</td>
                    <td class="px-4 py-3">{{ $b->minimum }} {{ $b->satuan }}</td>
                    <td class="px-4 py-3">{{ $b->supplier }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold
                            {{ $b->status === 'Menipis' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                            {{ $b->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-stone-500">
                        Bahan baku tidak ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
