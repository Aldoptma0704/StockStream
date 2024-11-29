@extends('user.navbar')

@section('title', 'Barang Pinjaman')

@section('content')
<div class="borrow-requests">
    <h1>Barang Pinjaman</h1>

    <div class="actions">
        <a href="{{ route('user.borrowReqs.create') }}" class="btn btn-primary" style="float: right; margin-bottom: 10px;">
            Ajukan Barang Pinjaman
        </a>
        <div style="clear: both;"></div>
    </div>

    @if ($borrowRequests->isEmpty())
        <p>Tidak ada barang pinjaman saat ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Alasan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowRequests as $index => $request)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $request->product->nama }}</td>
                        <td>{{ $request->product->kategori }}</td>
                        <td>{{ $request->borrow_date }}</td>
                        <td>{{ $request->return_date ?? 'Belum Dikembalikan' }}</td>
                        <td>{{ $request->reason }}</td>
                        <td>
                            @if ($request->status == 'pending')
                                <span class="badge badge-warning">Menunggu Validasi</span>
                            @elseif ($request->status == 'approved')
                                <span class="badge badge-success">Disetujui</span>
                            @elseif ($request->status == 'rejected')
                                <span class="badge badge-danger">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

        <a href="{{ route('user.dashboard') }}" class="btn btn-primary" style="float: left; margin-bottom: 10px;">Back</a><br>
    @endif
</div>

<style>
    .borrow-requests {
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #007bff;
    }
    .badge {
        padding: 5px 10px;
        border-radius: 5px;
        color: #fff;
        font-size: 0.9em;
    }
    .badge-warning {
        background-color: #ffc107;
    }
    .badge-success {
        background-color: #28a745;
    }
    .badge-danger {
        background-color: #dc3545;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
