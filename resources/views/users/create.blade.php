@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')


<style>
    /* Container Utama Deep Slate / Gunmetal */
    .form-wrapper {
        background: #0b0f17;
        background: radial-gradient(circle at top right, #1e293b 0%, #0f172a 70%, #0b0f17 100%);
        color: #f1f5f9;
        min-height: 100vh;
        padding: 40px 0;
    }

    /* Header Title */
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

    /* Card Container Form */
    .form-card-container {
        background-color: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 14px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Button Action Silver-Gelap Metalik */
    .btn-gunmetal-action {
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        font-weight: 700;
        padding: 10px 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.25s ease;
    }

    .btn-gunmetal-action:hover {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    .btn-cancel {
        background-color: rgba(255, 255, 255, 0.05);
        color: #94a3b8 !important;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 20px;
        transition: all 0.25s ease;
    }

    .btn-cancel:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff !important;
    }
</style>

<div class="form-wrapper">
    <div class="container px-4">

        {{-- Header Section --}}
        <div class="d-flex align-items-center justify-content-between mb-4 max-w-700 mx-auto" style="max-width: 700px;">
            <div>
                <h1 class="page-title">Tambah User Baru</h1>
                <p class="page-subtitle mb-0">Isi formulir di bawah ini untuk menambahkan pengguna baru</p>
            </div>
           
        </div>

        {{-- Form Container --}}
        <div class="form-card-container">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                @include('users._form', ['submitButtonText' => 'Simpan User'])
            </form>
        </div>

    </div>
</div>

@endsection