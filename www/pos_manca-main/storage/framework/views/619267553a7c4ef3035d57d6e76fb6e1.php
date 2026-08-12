<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* Container Utama Slate Dark */
    .users-wrapper {
        background: #0b0f17;
        background: radial-gradient(circle at top right, #1e293b 0%, #0f172a 60%, #0b0f17 100%);
        color: #f1f5f9;
        min-height: 100vh;
        padding: 40px 0;
    }

    /* Judul Halaman */
    .page-title {
        background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #94a3b8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-size: 1.8rem;
        margin-bottom: 4px;
    }

    .page-subtitle {
        color: #94a3b8 !important;
        font-size: 0.95rem;
    }

    /* Stat Cards */
    .stat-card-silver {
        background: linear-gradient(145deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.9) 100%);
        border: 1px solid rgba(226, 232, 240, 0.15);
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
    }

    .stat-label {
        color: #94a3b8 !important;
        font-size: 0.75rem;
        letter-spacing: 1px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .stat-value {
        color: #f8fafc !important;
        font-size: 1.5rem;
        font-weight: 800;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        background: linear-gradient(135deg, #e2e8f0 0%, #94a3b8 100%);
        color: #0f172a;
    }

    /* Button Action Gunmetal Metalik */
    .btn-gunmetal-action {
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        font-weight: 700;
        padding: 10px 22px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.25s ease;
    }

    .btn-gunmetal-action:hover {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    /* Form Pencarian */
    .search-box-wrapper {
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid rgba(148, 163, 184, 0.3);
        border-radius: 12px;
        padding: 4px;
    }

    .search-input-silver {
        background: transparent !important;
        border: none !important;
        color: #ffffff !important;
        padding: 10px 16px;
    }

    .search-input-silver::placeholder {
        color: #64748b !important;
    }

    .btn-search-silver {
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
        color: #f8fafc !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px !important;
        font-weight: 700;
        padding: 0 20px;
    }

    /* Wadah Tabel */
    .table-card-container {
        background: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.5);
        overflow: hidden;
    }

    .table-silver {
        margin-bottom: 0;
        background-color: #1e293b !important;
    }

    .table-silver thead {
        background-color: #0f172a !important;
    }

    .table-silver thead th {
        color: #cbd5e1 !important;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 0.8rem;
        padding: 18px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background-color: #0f172a !important;
    }

    .table-silver tbody tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        background-color: #1e293b !important;
    }

    .table-silver tbody tr:hover {
        background-color: #334155 !important;
    }

    .table-silver tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        background-color: transparent !important;
    }

    /* Teks Nama Pengguna */
    .user-name-text {
        color: #ffffff !important;
        font-weight: 700;
        font-size: 1rem;
    }

    .user-email-text {
        color: #cbd5e1 !important;
    }

    /* Badge Role */
    .badge-pill-custom {
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-admin {
        background: rgba(239, 68, 68, 0.2);
        color: #fca5a5 !important;
        border: 1px solid rgba(239, 68, 68, 0.4);
    }

    .badge-kasir {
        background: rgba(56, 189, 248, 0.2);
        color: #7dd3fc !important;
        border: 1px solid rgba(56, 189, 248, 0.4);
    }

    .badge-default {
        background: rgba(148, 163, 184, 0.2);
        color: #f1f5f9 !important;
        border: 1px solid rgba(148, 163, 184, 0.4);
    }

    /* Tombol Aksi */
    .btn-action-detail {
        background-color: rgba(56, 189, 248, 0.2);
        color: #38bdf8 !important;
        border: 1px solid rgba(56, 189, 248, 0.4);
        border-radius: 8px;
        font-weight: 700;
        padding: 6px 14px;
    }

    .btn-action-detail:hover {
        background-color: #38bdf8;
        color: #0f172a !important;
    }

    .btn-action-edit {
        background-color: rgba(245, 158, 11, 0.2);
        color: #fcd34d !important;
        border: 1px solid rgba(245, 158, 11, 0.4);
        border-radius: 8px;
        font-weight: 700;
        padding: 6px 14px;
    }

    .btn-action-edit:hover {
        background-color: #f59e0b;
        color: #0f172a !important;
    }

    .btn-action-delete {
        background-color: rgba(239, 68, 68, 0.2);
        color: #fca5a5 !important;
        border: 1px solid rgba(239, 68, 68, 0.4);
        border-radius: 8px;
        font-weight: 700;
        padding: 6px 14px;
    }

    .btn-action-delete:hover {
        background-color: #ef4444;
        color: white !important;
    }

    /* Modal Dark Theme */
    .modal-content-silver {
        background: #1e293b;
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 16px;
    }
</style>

<div class="users-wrapper">
    <div class="container-fluid px-4">

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 12px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Oops!</strong> <?php echo e(session('error')); ?>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: rgba(52, 211, 153, 0.2); color: #6ee7b7; border: 1px solid rgba(52, 211, 153, 0.4); border-radius: 12px;">
                <i class="bi bi-check-circle-fill me-2"></i><strong>Berhasil!</strong> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
            <div>
                <h1 class="page-title">Manajemen Users</h1>
                <p class="page-subtitle mb-0">Kelola hak akses dan akun pengguna aplikasi secara efisien</p>
            </div>

            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-gunmetal-action d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Tambah User Baru</span>
            </a>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-card-silver d-flex align-items-center gap-3">
                    <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <div class="stat-label">Total Pengguna</div>
                        <div class="stat-value"><?php echo e($users->total()); ?> User</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card-silver d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #f87171 0%, #dc2626 100%); color: white;"><i class="bi bi-shield-lock-fill"></i></div>
                    <div>
                        <div class="stat-label">Hak Akses</div>
                        <div class="stat-value">Admin & Kasir</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card-silver d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background: linear-gradient(135deg, #38bdf8 0%, #0284c7 100%); color: white;"><i class="bi bi-person-badge-fill"></i></div>
                    <div>
                        <div class="stat-label">Status Sistem</div>
                        <div class="stat-value" style="color: #38bdf8 !important;">Aktif</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-card-container">
            <div class="p-3 border-bottom border-secondary border-opacity-25 d-flex justify-content-between align-items-center flex-wrap gap-3">
                <span class="fw-bold text-white ms-2" style="font-size: 1rem;">
                    <i class="bi bi-table me-2" style="color: #94a3b8;"></i>Daftar Pengguna
                </span>

                <form action="<?php echo e(route('admin.users')); ?>" method="GET" style="max-width: 360px; width: 100%;">
                    <div class="input-group search-box-wrapper">
                        <input 
                            type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            class="form-control search-input-silver"
                            placeholder="Cari nama atau email..."
                        >
                        <button class="btn btn-search-silver" type="submit">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-silver align-middle">
                  <thead>
                    <tr>
                      <th scope="col" style="width: 5%;" class="text-center">#</th>
                      <th scope="col">Nama Pengguna</th>
                      <th scope="col">Alamat Email</th>
                      <th scope="col">Role / Peran</th>
                      <th scope="col" class="text-center" style="width: 22%;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-center fw-bold" style="color: #94a3b8 !important;"><?php echo e($users->firstItem() + $loop->index); ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold" 
                                     style="width: 38px; height: 38px; background: linear-gradient(135deg, #475569 0%, #334155 100%); color: #ffffff; border: 1px solid rgba(255,255,255,0.2); font-size: 0.9rem;">
                                    <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                </div>
                                <span class="user-name-text"><?php echo e($user->name); ?></span>
                            </div>
                        </td>
                        <td class="user-email-text"><?php echo e($user->email); ?></td>
                        <td>
                            <?php if(optional($user->role)->name === 'admin'): ?>
                                <span class="badge-pill-custom badge-admin"><i class="bi bi-shield-fill"></i> Admin</span>
                            <?php elseif(optional($user->role)->name === 'kasir'): ?>
                                <span class="badge-pill-custom badge-kasir"><i class="bi bi-cart-fill"></i> Kasir</span>
                            <?php else: ?>
                                <span class="badge-pill-custom badge-default"><i class="bi bi-person-fill"></i> <?php echo e(optional($user->role)->name ?? 'User'); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">

                                
                                <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-action-edit btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                
                                <button 
                                    class="btn btn-action-delete btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-user-id="<?php echo e($user->id); ?>"
                                    data-user-name="<?php echo e($user->name); ?>">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5" style="color: #94a3b8 !important;">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Tidak ada data pengguna ditemukan.
                        </td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
            </div>

            <div class="p-3 border-top border-secondary border-opacity-25 d-flex justify-content-end">
                <?php echo e($users->links()); ?>

            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background:#1e293b;color:white;border-radius:14px">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle-fill text-danger"></i>
                    Konfirmasi Hapus User
                </h5>

                <button type="button" 
                        class="btn-close btn-close-white" 
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">
                Apakah Anda yakin ingin menghapus user:
                <strong id="userName" class="text-danger"></strong>?
            </div>

            <div class="modal-footer border-0">
                <button type="button" 
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <form id="deleteForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">
                        Ya, Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
const deleteModal = document.getElementById('deleteModal');

deleteModal.addEventListener('show.bs.modal', function(event){
    const button = event.relatedTarget;
    const userId = button.getAttribute('data-user-id');
    const userName = button.getAttribute('data-user-name');

    document.getElementById('userName').innerText = userName;

    const form = document.getElementById('deleteForm');
    form.action = "/admin/users/" + userId;
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\pos_vancaa-1\pos_vanca\resources\views/users/index.blade.php ENDPATH**/ ?>