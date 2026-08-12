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


<div class="form-group-custom">
    <label for="name" class="form-label-custom">Nama Lengkap</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control form-control-dark <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
        placeholder="Masukkan nama lengkap"
        value="<?php echo e(old('name', $user->name ?? '')); ?>"
        required
    >
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-danger mt-1">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<div class="form-group-custom">
    <label for="email" class="form-label-custom">Alamat Email</label>
    <input 
        type="email" 
        name="email" 
        id="email" 
        class="form-control form-control-dark <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
        placeholder="nama@email.com"
        value="<?php echo e(old('email', $user->email ?? '')); ?>"
        required
    >
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-danger mt-1">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<div class="form-group-custom">
    <label for="role_id" class="form-label-custom">Role / Hak Akses</label>
    <select name="role_id" id="role_id" class="form-control form-control-dark <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
        <option value="" disabled selected>-- Pilih Role --</option>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->id); ?>" <?php echo e(old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : ''); ?>>
                <?php echo e(ucfirst($role->name)); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-danger mt-1">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<div class="form-group-custom">
    <label for="password" class="form-label-custom">
        Password 
        <?php if(isset($user)): ?> 
            <small class="text-muted fw-normal">(Biarkan kosong jika tidak ingin diubah)</small> 
        <?php endif; ?>
    </label>
    <input 
        type="password" 
        name="password" 
        id="password" 
        class="form-control form-control-dark <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
        placeholder="Masukkan password"
        <?php echo e(isset($user) ? '' : 'required'); ?>

    >
    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-danger mt-1">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<div class="form-group-custom">
    <label for="password_confirmation" class="form-label-custom">Konfirmasi Password</label>
    <input 
        type="password" 
        name="password_confirmation" 
        id="password_confirmation" 
        class="form-control form-control-dark" 
        placeholder="Ulangi password"
        <?php echo e(isset($user) ? '' : 'required'); ?>

    >
</div>


<div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top border-secondary border-opacity-25">
    <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-cancel">Batal</a>
    <button type="submit" class="btn btn-gunmetal-action">
        <?php echo e($submitButtonText ?? 'Simpan'); ?>

    </button>
</div><?php /**PATH C:\pos_vancaa-1\pos_vanca\resources\views/users/_form.blade.php ENDPATH**/ ?>