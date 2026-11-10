@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    <div class="kartu">
        <dl>
            <dt>Username</dt>
            <dd>{{ $username }}</dd>
            <dt>Peran</dt>
            <dd>{{ $peran }}</dd>
            <dt>Lokasi</dt>
            <dd>{{ $tempat }}</dd>
        </dl>
    </div>
@endsection
