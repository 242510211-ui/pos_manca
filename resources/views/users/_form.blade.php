<style>
    /* Style Komponen Input Form Gunmetal Theme */
    .form-group-custom {
        margin-bottom: 20px;
    }

    .form-label-custom {
        color: #cbd5e1 !important;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-control-dark {
        background-color: #0f172a !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        color: #ffffff !important;
        border-radius: 8px !important;
        padding: 10px 14px !important;
        font-size: 0.95rem;
        transition: all 0.25s ease;
    }

    .form-control-dark:focus {
        border-color: #64748b !important;
        box-shadow: 0 0 0 3px rgba(100, 116, 139, 0.25) !important;
        background-color: #0f172a !important;
        color: #ffffff !important;
    }

    .form-control-dark::placeholder {
        color: #64748b !important;
    }

    /* Option Select Dark */
    select.form-control-dark option {
        background-color: #0f172a;
        color: #ffffff;
    }
</style>

{{-- Input Nama --}}
<div class="form-group-custom">
    <label for="name" class="form-label-custom">Nama Lengkap</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control form-control-dark @error('name') is-invalid @enderror" 
        placeholder="Masukkan nama lengkap"
        value="{{ old('name', $user->name ?? '') }}"
        required
    >
    @error('name')
        <div class="invalid-feedback text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Input Email --}}
<div class="form-group-custom">
    <label for="email" class="form-label-custom">Alamat Email</label>
    <input 
        type="email" 
        name="email" 
        id="email" 
        class="form-control form-control-dark @error('email') is-invalid @enderror" 
        placeholder="nama@email.com"
        value="{{ old('email', $user->email ?? '') }}"
        required
    >
    @error('email')
        <div class="invalid-feedback text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Input Role / Peran --}}
<div class="form-group-custom">
    <label for="role_id" class="form-label-custom">Role / Hak Akses</label>
    <select name="role_id" id="role_id" class="form-control form-control-dark @error('role_id') is-invalid @enderror" required>
        <option value="" disabled selected>-- Pilih Role --</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
    @error('role_id')
        <div class="invalid-feedback text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Input Password --}}
<div class="form-group-custom">
    <label for="password" class="form-label-custom">
        Password 
        @if(isset($user)) 
            <small class="text-muted fw-normal">(Biarkan kosong jika tidak ingin diubah)</small> 
        @endif
    </label>
    <input 
        type="password" 
        name="password" 
        id="password" 
        class="form-control form-control-dark @error('password') is-invalid @enderror" 
        placeholder="Masukkan password"
        {{ isset($user) ? '' : 'required' }}
    >
    @error('password')
        <div class="invalid-feedback text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

{{-- Input Konfirmasi Password --}}
<div class="form-group-custom">
    <label for="password_confirmation" class="form-label-custom">Konfirmasi Password</label>
    <input 
        type="password" 
        name="password_confirmation" 
        id="password_confirmation" 
        class="form-control form-control-dark" 
        placeholder="Ulangi password"
        {{ isset($user) ? '' : 'required' }}
    >
</div>

{{-- Tombol Submit --}}
<div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary border-opacity-25">
    <a href="{{ route('admin.users') }}" class="btn btn-cancel">Batal</a>
    <button type="submit" class="btn btn-gunmetal-action">
        {{ $submitButtonText ?? 'Simpan' }}
    </button>
</div>