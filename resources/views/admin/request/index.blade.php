@extends('admin.navbar')

@section('title', 'Requests')
@section('content')
<h1>Daftar Permintaan Barang</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama User</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->user->name }}</td>
                <td>{{ $request->product_name }}</td>
                <td>{{ $request->category }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <a href="{{ route('admin.requests.show', $request->id) }}">Detail</a>
                    <a href="{{ route('admin.requests.approve', $request->id) }}">Setujui</a>
                    <a href="{{ route('admin.requests.reject', $request->id) }}">Tolak</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
