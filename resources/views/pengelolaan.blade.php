@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <h1>Daftar Bahan Baku</h1>
    <p>Data bahan baku yang tersedia di gudang.</p>

    <div class="tabel-bungkus">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bahan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['satuan'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
