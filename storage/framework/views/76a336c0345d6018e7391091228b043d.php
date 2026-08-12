<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* Container Utama Slate Dark */
    .sale-detail-wrapper {
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

    /* Kartu Ringkasan Informasi */
    .sale-summary-card {
        background: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        padding: 24px;
        margin-bottom: 30px;
    }

    .sale-info-label {
        color: #94a3b8 !important;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .sale-info-value {
        color: #f8fafc !important;
        font-size: 1.1rem;
        font-weight: 700;
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
        color: #f1f5f9;
    }

    /* Gambar Produk pada Tabel */
    .table-product-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: #0f172a;
    }

    /* Tombol Kembali Gunmetal */
    .btn-gunmetal-back {
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        font-weight: 700;
        padding: 12px 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-gunmetal-back:hover {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: #ffffff !important;
        transform: translateY(-2px);
    }
</style>

<div class="sale-detail-wrapper">
    <div class="container py-3" style="max-width: 900px;">

        <!-- Header Halaman -->
        <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="page-title">Detail Penjualan</h1>
                <p class="page-subtitle mb-0">Informasi ringkas dan daftar item transaksi</p>
            </div>
            <a href="<?php echo e(route('penjualan.index')); ?>" class="btn-gunmetal-back">
                <i class="bi bi-arrow-left-circle-fill"></i> Kembali
            </a>
        </div>

        <!-- Kartu Ringkasan Informasi Transaksi -->
        <div class="sale-summary-card">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="sale-info-label mb-1"><i class="bi bi-person-badge-fill me-1 text-info"></i> Kasir</div>
                    <div class="sale-info-value"><?php echo e(optional($sale->user)->name ?? 'Sistem'); ?></div>
                </div>
                <div class="col-md-4">
                    <div class="sale-info-label mb-1"><i class="bi bi-calendar-event-fill me-1 text-warning"></i> Tanggal Transaksi</div>
                    <div class="sale-info-value"><?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?></div>
                </div>
                <div class="col-md-4">
                    <div class="sale-info-label mb-1"><i class="bi bi-cash-stack me-1 text-success"></i> Total Pembayaran</div>
                    <div class="sale-info-value text-info">Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?></div>
                </div>
            </div>
        </div>

        <!-- Tabel Item Penjualan -->
        <div class="table-card-container">
            <div class="p-3 border-bottom border-secondary border-opacity-25">
                <span class="fw-bold text-white ms-2" style="font-size: 1rem;">
                    <i class="bi bi-list-check me-2 text-secondary"></i>Daftar Item Terjual
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-silver align-middle">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 8%;" class="text-center">#</th>
                            <th scope="col" style="width: 15%;" class="text-center">Foto</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col" class="text-end" style="width: 25%;">Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center fw-bold" style="color: #94a3b8 !important;"><?php echo e($i++); ?></td>
                            <td class="text-center">
                                <?php if($item->produk && $item->produk->foto): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->produk->foto)); ?>" class="table-product-img" alt="Foto Produk">
                                <?php else: ?>
                                    <div class="table-product-img d-flex align-items-center justify-content-center text-muted mx-auto">
                                        <i class="bi bi-image"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="fw-bold text-white"><?php echo e(optional($item->produk)->nama ?? 'Produk Dihapus'); ?></span>
                            </td>
                            <td class="text-end fw-bold text-info">
                                Rp <?php echo e(number_format(optional($item->produk)->harga_jual ?? 0, 0, ',', '.')); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\pos_vancaa-1\pos_vanca\resources\views/penjualan/detail.blade.php ENDPATH**/ ?>