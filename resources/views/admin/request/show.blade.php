@extends('admin.navbar')

@section('title', 'Detail Permintaan Barang')

@section('content')
<h1>Detail Permintaan Barang</h1>
<table>
    <tr>
        <th>ID Permintaan:</th>
        <td>{{ $request->id }}</td>
    </tr>
    <tr>
        <th>Nama User:</th>
        <td>{{ $request->user->name }}</td>
    </tr>
    <tr>
        <th>Nama Barang:</th>
        <td>{{ $request->product_name }}</td>
    </tr>
    <tr>
        <th>Kategori:</th>
        <td>{{ $request->category }}</td>
    </tr>
    <tr>
        <th>Status:</th>
        <td>{{ $request->status }}</td>
    </tr>
</table>

<div class="actions">
    <a href="{{ route('admin.requests.approve', $request->id) }}" class="btn btn-success">Setujui</a>
    <a href="{{ route('admin.requests.reject', $request->id) }}" class="btn btn-danger">Tolak</a>
</div>
@endsection
