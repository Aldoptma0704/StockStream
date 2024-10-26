@extends('layouts.layout')

@section('title', 'Home')

@section('content')
<div class="container-fluid p-0">
    <!-- Section dengan background gambar -->
    <div class="row justify-content-center align-items-center text-white hero-section" style="height: 70vh;">
        <div class="col-md-8 text-center">
            <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown hero-title">Welcome to StockStream</h1>
            <p class="lead mb-4 animate__animated animate__fadeInUp hero-description">StockStream adalah sistem manajemen barang elektronik yang dirancang untuk membantu pengguna dalam melacak lokasi barang secara efisien dan mendapatkan informasi detail mengenai produk yang disimpan. Dengan StockStream, pengguna dapat mengetahui secara pasti di mana barang elektronik diletakkan dalam inventaris, memastikan pengelolaan yang lebih baik dan akses informasi yang cepat terkait spesifikasi produk, jumlah stok, dan status ketersediaan.</p>
            
            <a href="{{ url('login') }}" class="btn btn-primary btn-md animate__animated animate__pulse animate__infinite">Get Started</a>
        </div>
    </div>
</div>
@endsection

@section('head')
    <style>
        /* Gaya untuk gambar latar belakang dan overlay */
        .hero-section {
            background: linear-gradient(to right bottom, rgba(0, 75, 160, 0.7), rgba(0, 123, 255, 0.7)), url('https://source.unsplash.com/1600x900/?electronics,technology') no-repeat center center/cover;
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.5);
            height: 100vh; /* Atur tinggi section agar sesuai dengan tinggi viewport */
        }

        /* Efek bayangan pada teks agar lebih menonjol */
        .hero-title {
            text-shadow: 2px 2px 15px rgba(0, 0, 0, 0.8);
            font-size: 2.5rem; /* Perkecil sedikit ukuran font */
        }

        .hero-description {
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.7);
            font-size: 1.1rem; /* Perkecil sedikit ukuran font */
        }

        /* Gaya tombol */
        .btn-primary {
            background-color: #007bff; /* Warna biru navbar */
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Biru lebih gelap saat hover */
            transform: translateY(-2px);
        }

        /* Gaya animasi */
        .animate__fadeInDown, .animate__fadeInUp {
            animation-duration: 1s;
        }

        .animate__pulse {
            animation-duration: 1.5s;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            .hero-description {
                font-size: 1rem;
            }
            .btn-primary {
                font-size: 0.9rem;
                padding: 8px 16px;
            }
        }
    </style>
@endsection
