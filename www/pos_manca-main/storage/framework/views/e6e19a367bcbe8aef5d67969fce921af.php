<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* Global Container - Nuansa Silver & Dark Slate */
    .dashboard-wrapper {
        background-color: #0f172a; /* Deep Slate */
        color: #f1f5f9;
        min-height: 100vh;
        padding: 30px 0;
    }

    /* Header Section */
    .dashboard-header-title {
        color: #f8fafc;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-size: 2rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }

    .date-badge {
        background: linear-gradient(135deg, #e2e8f0 0%, #94a3b8 100%);
        color: #0f172a;
        font-size: 0.9rem;
        font-weight: 700;
        border-radius: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    /* Section Heading Styling */
    .section-title {
        color: #e2e8f0;
        text-align: left;
        font-weight: 700;
        font-size: 1.15rem;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
    }

    .section-title i {
        font-size: 1.3rem;
    }

    /* Styling Kartu Statistik Silver Modern */
    .dashboard-card {
        background: linear-gradient(145deg, #1e293b 0%, #0f172a 100%);
        border: 1px solid #334155;
        border-radius: 14px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
    }
    
    .dashboard-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.5);
        border-color: #94a3b8;
    }

    /* Accent Borders Silver Tone */
    .dashboard-card.sales { 
        border-left: 4px solid #38bdf8;
    }
    .dashboard-card.cash { 
        border-left: 4px solid #818cf8;
    }
    .dashboard-card.pay-cash { 
        border-left: 4px solid #34d399;
    }
    .dashboard-card.pay-non-cash { 
        border-left: 4px solid #c084fc;
    }

    .dashboard-card h6 {
        font-size: 0.8rem;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 600;
        margin: 0;
    }

    .dashboard-card h4 { 
        font-weight: 800; 
        font-size: 1.8rem; 
        margin: 10px 0 0 0; 
        color: #ffffff;
    }

    /* Sub-Headers */
    .sub-title {
        color: #cbd5e1;
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Styling Tabel Custom Silver Dark */
    .custom-table-dark {
        background-color: #1e293b;
        color: #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #334155;
        box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    }

    .custom-table-dark thead th {
        border-bottom: 1px solid #334155;
        padding: 14px 16px;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }

    .custom-table-dark tbody td {
        background-color: #1e293b;
        color: #cbd5e1;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        padding: 12px 16px;
        vertical-align: middle;
    }

    .custom-table-dark tbody tr:hover td {
        background-color: #334155;
        color: #ffffff;
    }

    /* Header Tabel Silver Gradien */
    .th-warning {
        background: linear-gradient(90deg, #451a03 0%, #1e293b 100%);
        color: #fbbf24 !important;
    }

    .th-danger {
        background: linear-gradient(90deg, #450a0a 0%, #1e293b 100%);
        color: #f87171 !important;
    }

    .th-success {
        background: linear-gradient(90deg, #064e3b 0%, #1e293b 100%);
        color: #34d399 !important;
    }

    /* Custom Badges Silver Accent */
    .badge-cyber-warning {
        background-color: rgba(251, 191, 36, 0.15);
        color: #fbbf24;
        border: 1px solid rgba(251, 191, 36, 0.3);
    }

    .badge-cyber-danger {
        background-color: rgba(248, 113, 113, 0.15);
        color: #f87171;
        border: 1px solid rgba(248, 113, 113, 0.3);
    }

    .badge-cyber-success {
        background-color: rgba(52, 211, 153, 0.15);
        color: #34d399;
        border: 1px solid rgba(52, 211, 153, 0.3);
    }
</style>

<div class="dashboard-wrapper">
    <div class="container-fluid px-4">
        
        <div class="text-center mb-5">
            <h1 class="dashboard-header-title mb-2">
                Ringkasan Hari Ini
            </h1>
            <small class="badge date-badge px-3 py-2">
                <i class="bi bi-calendar3 me-1"></i> <?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>

            </small>
        </div>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('__viewAny', App\Models\User::class)): ?>
        <div class="row mt-4">
            <div class="col-md-12 mb-3">
                <h3 class="section-title">
                    <i class="bi bi-graph-up-arrow" style="color: #38bdf8;"></i> Penjualan Hari Ini
                </h3>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card sales p-4">
                    <h6>Total Nilai Penjualan</h6>
                    <h4>Rp <?php echo e(number_format($ringkasan['total_penjualan'])); ?></h4>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card cash p-4">
                    <h6>Jumlah Transaksi</h6>
                    <h4><?php echo e($ringkasan['total_transaksi']); ?> <span style="font-size: 1rem; font-weight: 500; color: #94a3b8;">Transaksi</span></h4>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <h3 class="section-title">
                    <i class="bi bi-wallet2" style="color: #34d399;"></i> Status Pembayaran
                </h3>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card pay-cash p-4">
                    <h6>Pembayaran Tunai</h6>
                    <h4>Rp <?php echo e(number_format($ringkasan['total_cash'])); ?></h4>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card pay-non-cash p-4">
                    <h6>Pembayaran Non-Tunai</h6>
                    <h4>Rp <?php echo e(number_format($ringkasan['total_non_tunai'])); ?></h4>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <h3 class="section-title">
                    <i class="bi bi-exclamation-triangle" style="color: #fbbf24;"></i> Status Inventori Kritis
                </h3>
            </div>

            <div class="col-md-6 mb-4">
                <h5 class="sub-title mb-3">
                    <i class="bi bi-box-seam me-1" style="color: #fbbf24;"></i> Produk Stok Rendah
                </h5>
                <div class="table-responsive">
                    <table class="table custom-table-dark align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="th-warning" style="width: 10%;">#</th>
                                <th scope="col" class="th-warning">Nama Produk</th>
                                <th scope="col" class="th-warning text-center" style="width: 25%;">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
                                <td class="fw-semibold text-white"><?php echo e($produk->nama); ?></td>
                                <td class="text-center">
                                    <span class="badge badge-cyber-warning px-3 py-2 fw-bold"><?php echo e($produk->stok); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center py-4" style="color: #94a3b8;">
                                    <i class="bi bi-check-circle me-1" style="color: #34d399;"></i> Seluruh produk berada dalam kondisi stok aman.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    <?php echo e($produkStokRendah->links()); ?>

                </div>
            </div>

            <div class="col-md-6 mb-4">
                <h5 class="sub-title mb-3">
                    <i class="bi bi-x-circle me-1" style="color: #f87171;"></i> Produk Habis Stok
                </h5>
                <div class="table-responsive">
                    <table class="table custom-table-dark align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="th-danger" style="width: 10%;">#</th>
                                <th scope="col" class="th-danger">Nama Produk</th>
                                <th scope="col" class="th-danger text-center" style="width: 25%;">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
                                <td class="fw-semibold text-white"><?php echo e($produk->nama); ?></td>
                                <td class="text-center">
                                    <span class="badge badge-cyber-danger px-3 py-2 fw-bold"><?php echo e($produk->stok); ?></span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center py-4" style="color: #94a3b8;">
                                    <i class="bi bi-check-circle me-1" style="color: #34d399;"></i> Seluruh produk tersedia.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    <?php echo e($produkStokHabis->links()); ?>

                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <h3 class="section-title">
                    <i class="bi bi-trophy" style="color: #34d399;"></i> Produk Terlaris
                </h3>
            </div>
            <div class="col-md-12 mb-4">
                <div class="table-responsive">
                    <table class="table custom-table-dark align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="th-success">Nama Produk</th>
                                <th scope="col" class="th-success text-center" style="width: 20%;">Stok Tersisa</th>
                                <th scope="col" class="th-success text-center" style="width: 20%;">Unit Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-semibold text-white"><?php echo e($produk->nama); ?></td>
                                <td class="text-center">
                                    <span class="badge bg-slate-700 text-light border border-slate-600 px-3 py-2"><?php echo e($produk->stok); ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-cyber-success px-3 py-2 fw-bold">
                                        <?php echo e($produk->total_terjual); ?> Unit
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="3" class="text-center py-4" style="color: #94a3b8;">
                                    Belum ada data penjualan.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\pos_vancaa-1\pos_vanca\resources\views/dashboard.blade.php ENDPATH**/ ?>