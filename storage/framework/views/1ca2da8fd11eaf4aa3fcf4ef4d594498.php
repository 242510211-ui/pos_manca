

<?php $__env->startSection('title', 'Edit Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

        
        <div class="d-flex align-items-center justify-content-between mb-4 mx-auto" style="max-width:700px;">
            <div>
                <h1 class="page-title">Edit Produk</h1>
                <p class="page-subtitle mb-0">
                    Perbarui informasi data produk yang sudah ada.
                </p>
            </div>
        </div>

        
        <div class="form-card-container">
            <form action="<?php echo e(route('produk.update', $produk)); ?>"
                  method="POST"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <?php echo $__env->make('produk._form', [
                    'submitButtonText' => 'Perbarui Produk'
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_manca-main\resources\views/produk/edit.blade.php ENDPATH**/ ?>