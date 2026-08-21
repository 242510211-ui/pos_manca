@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

@include('layouts.navbar')

<style>
    .form-wrapper {
        background: #0b0f17;
        background: radial-gradient(circle at top right, #1e293b 0%, #0f172a 70%, #0b0f17 100%);
        color: #f1f5f9;
        min-height: 100vh;
        padding: 40px 0;
    }

    .page-title {
        color: #f8fafc !important;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 1.8rem;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: #94a3b8 !important;
        font-size: 0.95rem;
    }

    .form-card-container {
        background-color: #1e293b !important;
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 14px;
        box-shadow: 0 15px 35px rgba(0,0,0,.4);
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
    }

    .btn-cancel {
        background-color: rgba(255,255,255,.05);
        color: #94a3b8 !important;
        border: 1px solid rgba(255,255,255,.15);
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 20px;
        transition: .25s;
    }

    .btn-cancel:hover {
        background-color: rgba(255,255,255,.1);
        color: #fff !important;
    }
</style>

<div class="form-wrapper">
    <div class="container px-4">

        {{-- Header --}}
        <div class="d-flex align-items-center justify-content-between mb-4 mx-auto" style="max-width:700px;">
            <div>
                <h1 class="page-title">Tambah Produk</h1>
                <p class="page-subtitle mb-0">
                    Tambahkan produk baru ke dalam katalog.
                </p>
            </div>
        </div>

        {{-- Form --}}
        <div class="form-card-container">
            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                @include('produk._form', [
                    'submitButtonText' => 'Simpan Produk'
                ])
            </form>
        </div>

    </div>
</div>

@endsection