@extends('layouts.app') {{-- Samakan dengan nama layout utama aplikasimu --}}

@section('content')
<style>
    body {
        background-color: #0b1329 !important; /* Latar belakang gelap sesuai dashboard */
    }
    .card-custom {
        background-color: #111c38;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }
    .card-custom-header {
        background-color: rgba(255, 255, 255, 0.03);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .badge-glow {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.4);
    }
    .spec-box {
        background-color: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-left: 3px solid #3b82f6;
    }
    /* Style untuk tombol kembali */
    .btn-back-custom {
        background-color: rgba(255, 255, 255, 0.05);
        color: #cbd5e1;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 8px;
        padding: 8px 16px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.25s ease;
    }
    .btn-back-custom:hover {
        background-color: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        transform: translateX(-3px);
    }
</style>

<div class="container py-5 text-white">
    <!-- Tombol Kembali & Judul Halaman -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('dashboard') }}" class="btn-back-custom d-inline-flex align-items-center gap-2">
            ← Kembali
        </a>
        <div class="text-center flex-grow-1 me-5">
            <h3 class="fw-bold text-uppercase tracking-wider mb-1" style="letter-spacing: 1.5px;">TENTANG SAYA & APLIKASI</h3>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill" style="background-color: #111c38; border: 1px solid rgba(255,255,255,0.1);">
                <small class="text-secondary">ℹ️ Informasi Sistem POS</small>
            </div>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Card Profil Pengembang -->
        <div class="col-lg-4 col-md-5">
            <div class="card card-custom h-100 text-center p-3">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <!-- Frame Foto Profil -->
                    <div class="mb-3 position-relative">
                        <img src="{{ asset('img/manca.jpeg') }}" 
                             alt="Foto Profil" 
                             class="rounded-circle object-fit-cover shadow-lg"
                             style="width: 140px; height: 140px; border: 3px solid #3b82f6;">
                    </div>
                    
                    <h4 class="fw-bold text-white mb-1">Vanca Putra Utama</h4>
                    <p class="text-secondary small mb-3">XII RPL 1</p>

                    <span class="badge badge-glow px-3 py-2 rounded-pill small">Web Developer</span>
                </div>
            </div>
        </div>

        <!-- Card Detail & Spesifikasi Aplikasi -->
        <div class="col-lg-7 col-md-7">
            <div class="card card-custom h-100">
                <div class="card-header card-custom-header text-white-50 px-4 py-3 small text-uppercase">
                    📌 INFORMASI & SPESIFIKASI SISTEM
                </div>
                <div class="card-body p-4">
                    <h5 class="fw-bold text-white mb-2">Aplikasi Point of Sale (POS)</h5>
                    <p class="text-secondary small mb-4" style="line-height: 1.6;">
                        Aplikasi kasir berbasis web yang dirancang untuk mengelola inventaris produk, pencatatan transaksi penjualan harian, serta manajemen pengguna (Admin & Kasir) secara efisien.
                    </p>

                    <hr style="border-color: rgba(255, 255, 255, 0.1);" class="mb-4">

                    <!-- Spesifikasi Teknis (Grid Card Dark) -->
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 rounded spec-box">
                                <span class="text-secondary d-block extra-small" style="font-size: 0.75rem;">VERSI APLIKASI</span>
                                <strong class="text-white fs-6">v1.0.0</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded spec-box" style="border-left-color: #10b981;">
                                <span class="text-secondary d-block extra-small" style="font-size: 0.75rem;">FRAMEWORK</span>
                                <strong class="text-white fs-6">Laravel 12.x</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded spec-box" style="border-left-color: #f59e0b;">
                                <span class="text-secondary d-block extra-small" style="font-size: 0.75rem;">VERSI PHP</span>
                                <strong class="text-white fs-6">PHP 8.4</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded spec-box" style="border-left-color: #8b5cf6;">
                                <span class="text-secondary d-block extra-small" style="font-size: 0.75rem;">UI FRAMEWORK</span>
                                <strong class="text-white fs-6">Bootstrap 5</strong>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection