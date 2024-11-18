@extends('user.dashboard')

@section('title', 'User Dashboard')

@section('content')
 
<div class="container mt-4">
    <h1 class="text-center">Selamat Datang, {{Session::get('user')['name']}}!</h1>
    <p class="text-center">Akses inventaris dengan mudah dan ajukan permintaan barang.</p>
    
    <!-- Ringkasan Inventaris -->
    <div class="stats-grid">
        <div class="stat-box">
            <i class="fas fa-box-open stat-icon"></i>
            <h2>Barang Tersedia</h2>
            <p>{{ $availableItemsCount ?? 0 }} Total Barang</p>
            <a href="{{ route('user.items.available') }}">Lihat Barang</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-truck stat-icon"></i>
            <h2>Barang Pinjaman</h2>
            <p>{{ $borrowedItemsCount ?? 0 }} Total Barang Pinjam</p>
            <a href="{{ route('user.items.borrowed') }}">Lihat Barang P</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-clipboard-list stat-icon"></i>
            <h2>Permintaan Barang</h2>
            <p>{{  $requestsCount ?? 0 }} Total Permintaan</p>
            <a href="{{ route('user.requests.index') }}">Lihat Permintaan</a>
        </div>
        <div class="stat-box">
            <i class="fas fa-tools stat-icon"></i>
            <h2>Barang Dalam Perbaikan</h2>
            <p>{{ $inRepairItemsCount ?? 0 }} Total Barang Perbaikan</p>
            <a href="{{ route('user.items.repair') }}">Lihat Detail</a>
        </div>
    </div>

    <!-- Aksi Cepat -->
    <div class="row text-center mt-5">
        <h2 class="text-center">Aksi Cepat</h2>
    </div>

</div>

<style>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
