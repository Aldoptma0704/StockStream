@extends('user.dashboard')

@section('title', 'Barang Tersedia')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Barang Tersedia</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($availableItems as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
