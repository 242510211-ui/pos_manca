

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* Wrapper & Theme Styling */
    .pos-wrapper {
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

    /* Card Styling */
    .pos-card {
        background-color: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 14px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        color: #f1f5f9;
    }

    .pos-card .card-footer {
        background-color: rgba(15, 23, 42, 0.6) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        border-bottom-left-radius: 14px;
        border-bottom-right-radius: 14px;
        padding: 20px;
    }

    /* Search & Inputs */
    .pos-search-input, .pos-form-control {
        background-color: #0f172a !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        color: #f1f5f9 !important;
        border-radius: 10px;
    }

    .pos-search-input:focus, .pos-form-control:focus {
        border-color: #64748b !important;
        box-shadow: 0 0 0 0.25rem rgba(100, 116, 139, 0.25);
    }

    .pos-search-input::placeholder {
        color: #64748b !important;
    }

    /* Product Item Button */
    .btn-product-item {
        background-color: #0f172a !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 10px;
        color: #f1f5f9 !important;
        transition: all 0.25s ease;
    }

    .btn-product-item:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(255, 255, 255, 0.2) !important;
        transform: translateY(-2px);
    }

    /* Table Customization */
    .pos-table {
        color: #f1f5f9 !important;
        margin-bottom: 0;
    }

    .pos-table th {
        background-color: #0f172a !important;
        color: #94a3b8 !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }

    .pos-table td {
        background-color: #1e293b !important;
        border-color: rgba(255, 255, 255, 0.08) !important;
        vertical-align: middle;
        color: #f1f5f9 !important;
    }

    /* Action Buttons */
    .btn-gunmetal-action {
        background: linear-gradient(135deg, #475569 0%, #334155 100%);
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.25s ease;
    }

    .btn-gunmetal-action:hover {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: #ffffff !important;
    }
</style>

<div class="pos-wrapper">
    <div class="container px-4">

        
        <?php if(session('error')): ?>
            <div class="alert alert-danger bg-danger text-white border-0 shadow-sm mb-4" style="border-radius: 10px;">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success bg-success text-white border-0 shadow-sm mb-4" style="border-radius: 10px;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger bg-danger text-white border-0 shadow-sm mb-4" style="border-radius: 10px;">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="page-title">POS (Point of Sales)</h1>
                <p class="page-subtitle mb-0">Kelola transaksi penjualan dengan cepat dan mudah.</p>
            </div>
            <div>
                <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-outline-secondary px-4" style="border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row g-4">

            
            <div class="col-md-6">
                <div class="card pos-card">
                    <div class="card-body" style="max-height:70vh; overflow:auto">
                        <div class="mb-3">
                            <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                                <input type="text"
                                name="search"
                                value="<?php echo e(request('search')); ?>"
                                class="form-control pos-search-input"
                                placeholder="Cari produk...."
                                autocomplete="off"
                                onkeyup="this.form.submit()">
                            </form>
                        </div>
                        
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="POST" action="<?php echo e(route('itempenjualan.store')); ?>" class="row g-2 align-items-center mb-2">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                            <div class="col-7">
                                <button type="submit" class="btn btn-product-item w-100 text-start p-2 <?php echo e((isset($sale) && $sale->status === 'COMPLETED') ? 'disabled' : ''); ?>">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                         alt="Gambar"
                                         class="rounded-circle"
                                         style="width:45px; height:45px; object-fit:cover; border: 1px solid rgba(255,255,255,0.2);">

                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="fw-semibold text-truncate text-light">
                                                <?php echo e($product->nama); ?>

                                                <?php if($product->stok <= 0): ?>
                                                    <span class="badge bg-danger ms-1">Habis</span>
                                                <?php endif; ?>
                                            </div>
                                            <small class="text-light d-block">
                                                Rp <?php echo e(number_format($product->harga_jual)); ?> | Stok: <?php echo e($product->stok); ?>

                                            </small>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            
                            <div class="col-3">
                                <input type="number" name="quantity" value="1" min="1"
                                class="form-control pos-form-control <?php echo e((isset($sale) && $sale->status === 'COMPLETED') ? 'readonly' : ''); ?>">
                            </div>

                            <div class="col-2">
                                <?php if($product->stok > 0 && (!isset($sale) || $sale->status !== 'COMPLETED')): ?>
                                    <button type="submit" class="btn btn-gunmetal-action w-100">
                                        +
                                    </button>
                                <?php elseif($product->stok <= 0): ?>
                                    <button type="button" class="btn btn-danger w-100" disabled>
                                        -
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-secondary w-100" disabled>
                                        +
                                    </button>
                                <?php endif; ?>
                            </div>
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            
            <div class="col-md-6">
                <div class="card pos-card">
                    <div class="table-responsive" style="max-height: 50vh; overflow-y: auto;">
                        <table class="table pos-table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th style="width: 80px;">Qty</th>
                                    <th>Subtotal</th>
                                    <th style="width: 90px;" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = ($sale->itemPenjualan ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item->produk->nama); ?></td>
                                    <td>Rp <?php echo e(number_format($item->produk->harga_jual)); ?></td>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">
                                            <?php echo csrf_field(); ?> 
                                            <?php echo method_field('PUT'); ?>
                                            <input type="number" name="quantity"
                                            value="<?php echo e($item->kuantitas); ?>"
                                            class="form-control pos-form-control form-control-sm text-center"
                                            onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td>Rp <?php echo e(number_format($item->subtotal)); ?></td>
                                    
                                    
                                    <td class="text-center">
                                        <form method="POST" action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>">
                                            <?php echo csrf_field(); ?> 
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm px-2 py-1" style="border-radius: 6px; font-size: 0.8rem;">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Keranjang kosong
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted fw-semibold">Total Pembayaran:</span>
                            <strong class="fs-5 text-light">Rp <?php echo e(number_format($sale->total_pembayaran ?? 0)); ?></strong>
                        </div>

                       <form id="checkoutForm" method="POST" action="<?php echo e(route('penjualan.update', $sale->id ?? 0)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <select name="payment_method" 
                                    class="form-select pos-form-control mb-2"
                                    <?php echo e((isset($sale) && $sale->status === 'COMPLETED') ? 'disabled' : ''); ?>

                                    required>
                                <option value="" style="background: #0f172a; color: #64748b;">
                                    Pilih Pembayaran
                                </option>
                                <option value="CASH" style="background: #0f172a; color: #f1f5f9;">
                                    Cash
                                </option>
                                <option value="QRIS" style="background: #0f172a; color: #f1f5f9;">
                                    QRIS
                                </option>
                            </select>

                            <button type="button"
                                class="btn btn-success w-100 fw-bold mb-2 <?php echo e((!isset($sale) || $sale->status === 'COMPLETED' || empty($sale->itemPenjualan) || $sale->itemPenjualan->isEmpty()) ? 'disabled' : ''); ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#checkoutModal">
                                Checkout
                            </button>
                        </form>

                        
                        <?php if(isset($sale) && $sale->id && isset($sale->itemPenjualan) && !$sale->itemPenjualan->isEmpty() && $sale->status !== 'COMPLETED'): ?>
                            <button type="button" 
                                    class="btn btn-outline-danger w-100 mt-1" 
                                    style="border-radius: 10px;"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#batalTransaksiModal"
                                    data-penjualan-id="<?php echo e($sale->id); ?>">
                                <i class="bi bi-x-circle me-1"></i> Batal Transaksi
                            </button>
                        <?php else: ?>
                            <button type="button" 
                                    class="btn btn-outline-danger w-100 mt-1" 
                                    style="border-radius: 10px;" 
                                    disabled>
                                <i class="bi bi-x-circle me-1"></i> Batal Transaksi
                            </button>
                        <?php endif; ?>

                        <!-- Modal Checkout Confirmation -->
                        <div class="modal fade" id="checkoutModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="background-color:#1e293b; color:#f1f5f9; border-radius:14px;">

                                    <div class="modal-header" style="border-bottom:1px solid rgba(255,255,255,0.1);">
                                        <h5 class="modal-title fw-bold">Konfirmasi Checkout</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body p-4">
                                        <p style="color:#f1f5f9; font-size:1rem;">
                                            Apakah anda yakin ingin menyelesaikan transaksi ini?
                                        </p>
                                        <div class="alert alert-warning mt-3 mb-0" 
                                             style="background:rgba(245,158,11,0.15); border:1px solid rgba(245,158,11,0.4); color:#fcd34d; border-radius:10px;">
                                            <i class="bi bi-info-circle-fill me-2"></i>
                                            Pastikan metode pembayaran sudah benar.
                                        </div>
                                    </div>

                                    <div class="modal-footer" style="border-top:1px solid rgba(255,255,255,0.1);">
                                        <button type="button" class="btn btn-secondary btn-sm px-4 fw-bold" data-bs-dismiss="modal" style="border-radius:8px;">
                                            Jangan
                                        </button>
                                        <button type="button" id="confirmCheckout" class="btn btn-success btn-sm px-4 fw-bold" style="border-radius:8px;">
                                            <i class="bi bi-check-circle-fill me-1"></i> Ya, Checkout
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Batal Transaksi Confirmation -->
<div class="modal fade" id="batalTransaksiModal" tabindex="-1" aria-labelledby="batalTransaksiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #1e293b; color: #f1f5f9; border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
      <div class="modal-header" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
        <h5 class="modal-title fw-bold" id="batalTransaksiModalLabel" style="color: #f8fafc;">
          Konfirmasi Pembatalan Transaksi
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <p class="mb-2" style="color: #f1f5f9;">
          Apakah anda yakin ingin membatalkan transaksi ini?
        </p>
        <p class="text-muted mb-0 small">
          Tindakan ini tidak dapat dibatalkan.
        </p>
      </div>
      <div class="modal-footer" style="border-top: 1px solid rgba(255,255,255,0.1); gap: 10px;">
        <button type="button" class="btn btn-cancel btn-sm px-3" data-bs-dismiss="modal" style="background-color: rgba(255,255,255,0.05); color: #94a3b8; border: 1px solid rgba(255,255,255,0.15); border-radius: 8px;">
          Jangan
        </button>
        <form id="batalTransaksiForm" method="POST" style="display: inline;">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit" class="btn btn-danger btn-sm px-3" style="border-radius: 8px; font-weight: 600;">
            Ya, Batalkan Transaksi
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const batalTransaksiModal = document.getElementById('batalTransaksiModal');
  const batalTransaksiForm = document.getElementById('batalTransaksiForm');

  if (batalTransaksiModal) {
    batalTransaksiModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const penjualanId = button.getAttribute('data-penjualan-id');
      batalTransaksiForm.action = `/penjualan/${penjualanId}`;
    });
  }

  // Checkout Modal
  const checkoutForm = document.getElementById('checkoutForm');
  const confirmCheckout = document.getElementById('confirmCheckout');

  if(confirmCheckout && checkoutForm){
      confirmCheckout.addEventListener('click', function(){
          checkoutForm.submit();
      });
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_manca-main\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>