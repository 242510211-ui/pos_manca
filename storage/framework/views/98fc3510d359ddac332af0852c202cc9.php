

<?php $__env->startSection('title', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* Container Utama Slate Dark */
    .product-detail-wrapper {
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

    /* Kartu Detail Produk */
    .card-detail-silver {
        background: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        overflow: hidden;
    }

    /* Styling Gambar Produk */
    .product-img-container {
        position: relative;
        background: #0f172a;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        overflow: hidden;
        height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-img-container img:hover {
        transform: scale(1.03);
    }

    /* Label & Nilai Informasi */
    .info-item {
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 12px;
        padding: 12px 16px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .info-label {
        color: #94a3b8 !important;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-value {
        color: #f8fafc !important;
        font-weight: 700;
        font-size: 1rem;
    }

    /* Harga Khusus */
    .price-tag-sell {
        color: #38bdf8 !important;
        font-size: 1.2rem !important;
    }

    .price-tag-buy {
        color: #cbd5e1 !important;
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

<div class="product-detail-wrapper">
    <div class="container py-3" style="max-width: 700px;">

        <!-- Header Halaman -->
        <div class="mb-4 text-center">
            <h1 class="page-title">Detail Produk</h1>
            <p class="page-subtitle mb-0">Informasi lengkap spesifikasi dan data produk</p>
        </div>

        <!-- Kartu Utama -->
        <div class="card card-detail-silver">
            
            <!-- Foto Produk -->
            <div class="product-img-container">
                <?php if($produk->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $produk->foto)); ?>" alt="<?php echo e($produk->nama); ?>">
                <?php else: ?>
                    <div class="text-center text-muted">
                        <i class="bi bi-image fs-1 d-block mb-1"></i>
                        <span>Tidak ada foto</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Konten Detail -->
            <div class="card-body p-4 p-md-5">
                
                <h3 class="fw-bold text-white mb-4 text-center" style="letter-spacing: 0.5px;">
                    <?php echo e($produk->nama); ?>

                </h3>

                <div class="info-item">
                    <span class="info-label"><i class="bi bi-tag-fill text-secondary"></i> Harga Dasar (Beli)</span>
                    <span class="info-value price-tag-buy">Rp <?php echo e(number_format($produk->harga_beli, 0, ',', '.')); ?></span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="bi bi-cash-stack text-info"></i> Harga Jual</span>
                    <span class="info-value price-tag-sell">Rp <?php echo e(number_format($produk->harga_jual, 0, ',', '.')); ?></span>
                </div>

                <div class="info-item">
                    <span class="info-label"><i class="bi bi-box-seam-fill text-warning"></i> Stok Tersedia</span>
                    <span class="info-value">
                        <span class="badge bg-secondary bg-opacity-25 text-info border border-info border-opacity-25 px-3 py-2 rounded-pill">
                            <?php echo e($produk->stok); ?> Pcs
                        </span>
                    </span>
                </div>

                <div class="info-item mb-4">
                    <span class="info-label"><i class="bi bi-person-badge-fill text-success"></i> Pengimput / Petugas</span>
                    <span class="info-value"><?php echo e(optional($produk->user)->name ?? 'Sistem'); ?></span>
                </div>

                <!-- Tombol Navigasi -->
                <div class="text-center mt-4">
                    <a href="<?php echo e(route('produk.index')); ?>" class="btn-gunmetal-back">
                        <i class="bi bi-arrow-left-circle-fill"></i> Kembali ke Daftar Produk
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_manca-main\resources\views/produk/detail.blade.php ENDPATH**/ ?>