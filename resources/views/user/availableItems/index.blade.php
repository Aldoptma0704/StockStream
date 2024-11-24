@extends('user.navbar')

@section('title', 'Barang Tersedia')

@section('content')
<div class="available-items">
    <h1>Barang Tersedia</h1>

    @if ($products->isEmpty())
        <p>Tidak ada barang yang tersedia saat ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Spesifikasi</th>
                    <th>Stok</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->spesifikasi }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>{{ $product->location->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<style>
    .available-items {
        padding: 20px;
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
</style>
@endsection
