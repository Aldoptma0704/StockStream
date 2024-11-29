@extends('user.navbar')

@section('title', 'User Dashboard')

@section('content')
<div class="dashboard">
    <h1>Selamat Datang, {{Session::get('user')['name']}}!</h1>
    <p class="intro">Tampilan dashboard yang sederhana dan ringkas membuat anda lebih nyaman menggunakannya.</p>
    
    <div class="stats-grid">
        <div class="stat-box">
        <i class="fas fa-box-open stat-icon"></i>
            <h2>Barang Tersedia</h2>
            <p>{{ $availableItemsCount ?? 0 }} Total Barang</p>
            <a href="{{ route('user.availableItems.index') }}">Lihat Barang</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-truck stat-icon"></i>
            <h2>Barang Pinjaman</h2>
            <p>{{ $borrowedItemsCount ?? 0 }} Total Barang Ingin Dipinjam</p>
            <a href="{{ route('user.borrowReqs.index') }}">Lihat Status Barang Pinjaman</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-truck stat-icon"></i>
            <h2>Barang yang Diminta</h2>
            <p>{{ $requestItemCount ?? 0 }} Total Barang Diminta</p>
            <a href="{{ route('user.requestItems.index') }}">Lihat Barang yang Diminta</a>
        </div>
    </div>

    <div class="actions">
        <h2>Aksi Cepat</h2>
        <p>Gunakan tombol di bawah untuk melakukan aksi cepat seperti menambahkan produk, supplier, atau lokasi baru.</p>
        <div class="actions-grid">
            <a href="{{ route('user.borrowReqs.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Ajukan Perminjaman Barang
            </a>
            <a href="{{ route('user.requestItems.create') }}" class="action-button">
                <i class="fas fa-plus-circle"></i> Ajukan Permintaan Barang
            </a>
        </div>
    </div>

</div>

<style>
    .dashboard {
        font-family: Arial, sans-serif;
        padding: 20px;
    }
    .intro {
        margin-bottom: 20px;
        color: #555;
    }
    .stats-grid {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }
    .stat-box {
        flex: 1;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
        background-color: #f9f9f9;
        position: relative;
    }
    .stat-icon {
        font-size: 40px;
        color: #007bff;
        margin-bottom: 10px;
    }
    .stat-box h2 {
        margin-bottom: 10px;
    }
    .stat-box a {
        display: inline-block;
        margin-top: 10px;
        text-decoration: none;
        color: #007bff;
    }
    .actions {
        margin-top: 30px;
    }
    .actions-grid {
        display: flex;
        gap: 20px;
    }
    .action-button {
        flex: 1;
        padding: 15px 20px;
        text-align: center;
        border: none;
        border-radius: 8px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-size: 16px;
    }
    .action-button i {
        font-size: 20px;
    }
    .action-button:hover {
        background-color: #0056b3;
    }
</style>

<!-- Include Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
