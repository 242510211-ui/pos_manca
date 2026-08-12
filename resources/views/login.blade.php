@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    .form-wrapper {
        background: #0b0f17;
        background: radial-gradient(circle at top right, #1e293b 0%, #0f172a 70%, #0b0f17 100%);
        color: #f1f5f9;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
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
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
    }

    .form-label {
        font-weight: 600;
        color: #f1f5f9 !important;
    }

    .form-control {
        background-color: #0f172a !important;
        border: 1px solid rgba(255,255,255,.15) !important;
        color: #f1f5f9 !important;
        border-radius: 8px;
        padding: 10px 14px;
    }

    .form-control:focus {
        border-color: #667eea !important;
        box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25) !important;
    }

    .btn-login {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 12px;
        color: #fff;
        width: 100%;
        transition: opacity 0.2s;
    }

    .btn-login:hover {
        opacity: 0.9;
        color: #fff;
    }
</style>

<div class="form-wrapper">
    <div class="container px-4">

        {{-- Header Judul Halaman --}}
        <div class="text-center mb-4">
            <h1 class="page-title">Login</h1>
            <p class="page-subtitle mb-0">
                Silakan masuk menggunakan akun Anda.
            </p>
        </div>

        {{-- Card Form Login --}}
        <div class="form-card-container">
            <form action="{{ route('auth') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" 
                    id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                    @error('email')
                        <div class="badge text-bg-danger" style="margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" 
                    id="exampleInputPassword1">
                    @error('password')
                        <div class="badge text-bg-danger" style="margin-top: 5px;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-login mt-2">Login</button>
            </form>
        </div>

    </div>
</div>

@endsection