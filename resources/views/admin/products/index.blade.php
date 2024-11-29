@extends('admin.navbar')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container">
        <h1 class="page-title"><i class="fas fa-boxes"></i> Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Produk</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>{{ $product->location->nama ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info"><i class="fas fa-eye"></i> Lihat Detail</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="float: left; margin-bottom: 10px;">Back</a><br><br>

    <style>
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 90%;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #28a745;
            color: white;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #17a2b8;
            color: white;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tr:hover {
            background-color: #f1f3f5;
        }

        .table td {
            color: #333;
        }
    </style>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
