@extends('user.navbar')

@section('title', 'Ajukan Barang Pinjaman')

@section('content')
<div class="borrow-create">
    <h1>Ajukan Barang Pinjaman</h1>

    <form action="{{ route('user.borrowReqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Nama Barang</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="" disabled selected>Pilih Barang</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nama }} (Stok: {{ $product->stok }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="borrow_date">Tanggal Pinjam</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="return_date">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="reason">Alasan Pinjam</label>
            <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan Pinjaman</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>

<style>
    .borrow-create {
        padding: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
