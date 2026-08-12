<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* Container Utama Deep Slate / Gunmetal */
    .sales-wrapper {
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

    /* Button Action Silver-Gelap Metalik */
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

    /* Wadah Tabel */
    .table-card-container {
        background-color: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 14px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        overflow: hidden;
    }

    .table-dark-custom {
        margin-bottom: 0;
        width: 100%;
        background-color: #1e293b !important;
    }

    .table-dark-custom thead {
        background-color: #0f172a !important;
    }

    .table-dark-custom thead th {
        color: #cbd5e1 !important;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 0.8rem;
        padding: 18px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background-color: #0f172a !important;
    }

    .table-dark-custom tbody tr {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        background-color: #1e293b !important;
    }

    .table-dark-custom tbody tr:hover {
        background-color: #273549 !important;
    }

    .table-dark-custom tbody td {
        padding: 16px 20px;
        vertical-align: middle;
        background-color: transparent !important;
    }

    /* Teks Terang */
    .text-custom-main {
        color: #ffffff !important;
        font-weight: 700;
    }

    .text-custom-sub {
        color: #cbd5e1 !important;
    }

    .price-total {
        color: #4ade80 !important; /* Hijau Terang */
        font-weight: 700;
        font-size: 1rem;
    }

    /* Badges Style */
    .badge-pill-custom {
        padding: 6px 12px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.75rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-cash {
        background: rgba(52, 211, 153, 0.2);
        color: #6ee7b7 !important;
        border: 1px solid rgba(52, 211, 153, 0.4);
    }

    .badge-transfer {
        background: rgba(56, 189, 248, 0.2);
        color: #7dd3fc !important;
        border: 1px solid rgba(56, 189, 248, 0.4);
    }

    .badge-status-success {
        background: rgba(52, 211, 153, 0.2);
        color: #6ee7b7 !important;
        border: 1px solid rgba(52, 211, 153, 0.4);
    }

    .badge-status-pending {
        background: rgba(245, 158, 11, 0.2);
        color: #fcd34d !important;
        border: 1px solid rgba(245, 158, 11, 0.4);
    }

    /* Action Buttons */
    .btn-action-info {
        background-color: rgba(56, 189, 248, 0.2);
        color: #7dd3fc !important;
        border: 1px solid rgba(56, 189, 248, 0.4);
        border-radius: 8px;
        font-weight: 700;
        padding: 6px 12px;
    }

    .btn-action-info:hover {
        background-color: #38bdf8;
        color: #0f172a !important;
    }

    .btn-action-edit {
        background-color: rgba(245, 158, 11, 0.2);
        color: #fcd34d !important;
        border: 1px solid rgba(245, 158, 11, 0.4);
        border-radius: 8px;
        font-weight: 700;
        padding: 6px 12px;
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
        padding: 6px 12px;
    }

    .btn-action-delete:hover {
        background-color: #ef4444;
        color: #ffffff !important;
    }
</style>

<div class="sales-wrapper">
    <div class="container-fluid px-4">

        
        <?php if(session('error')): ?>
            <div class="alert alert-danger fade show" role="alert" style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 12px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Oops!</strong> <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success fade show" role="alert" style="background: rgba(52, 211, 153, 0.2); color: #6ee7b7; border: 1px solid rgba(52, 211, 153, 0.4); border-radius: 12px;">
                <i class="bi bi-check-circle-fill me-2"></i><strong>Berhasil!</strong> <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
            <div>
                <h1 class="page-title">Halaman Penjualan</h1>
                <p class="page-subtitle mb-0">Riwayat transaksi dan pembuatan transaksi kasir baru</p>
            </div>

            <a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-gunmetal-action d-inline-flex align-items-center gap-2">
                <i class="bi bi-cart-plus-fill fs-5"></i>
                <span>Transaksi Baru</span>
            </a>
        </div>

        
        <div class="table-card-container">
            
            <div class="p-3 border-bottom border-secondary border-opacity-25 d-flex justify-content-between align-items-center flex-wrap gap-3">
                <span class="fw-bold text-white ms-2">
                    <i class="bi bi-receipt me-2 text-secondary"></i>Daftar Penjualan
                </span>

                <form action="<?php echo e(route('penjualan.index')); ?>" method="GET" style="max-width: 350px; width: 100%;">
                    <div class="input-group" style="background: rgba(15, 23, 42, 0.6); border: 1px solid rgba(255,255,255,0.15); border-radius: 8px; padding: 2px;">
                        <input 
                            type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            class="form-control bg-transparent border-0 text-white"
                            placeholder="Cari penjualan..."
                        >
                        <button class="btn btn-secondary btn-sm rounded-2 px-3" type="submit">
                            Cari
                        </button>
                    </div>
                </form>
            </div>

            
            <div class="table-responsive">
                <table class="table table-dark-custom align-middle">
                  <thead>
                    <tr>
                      <th scope="col" style="width: 4%;" class="text-center">#</th>
                      <th scope="col">Tanggal Transaksi</th>
                      <th scope="col">Kasir</th>
                      <th scope="col">Total Pembayaran</th>
                      <th scope="col">Metode Pembayaran</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="text-center" style="width: 18%;">Aksi</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                      <td class="text-center fw-bold" style="color: #94a3b8 !important;">
                        <?php echo e($sales->firstItem() + $loop->index); ?>

                      </td>
                      <td class="text-custom-sub">
                        <i class="bi bi-calendar-event me-1 text-secondary"></i>
                        <?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?>

                      </td>
                      <td class="text-custom-main"><?php echo e($sale->user->name); ?></td>
                      <td class="price-total">Rp <?php echo e(number_format($sale->total_pembayaran)); ?></td>
                      <td>
                        <?php if($sale->metode_pembayaran === 'cash'): ?>
                            <span class="badge-pill-custom badge-cash">💵 Tunai</span>
                        <?php elseif($sale->metode_pembayaran === 'transfer'): ?>
                            <span class="badge-pill-custom badge-transfer">🏦 Transfer</span>
                        <?php else: ?>
                            <span class="badge-pill-custom badge-transfer"><?php echo e($sale->metode_pembayaran); ?></span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if($sale->status === 'selesai'): ?>
                            <span class="badge-pill-custom badge-status-success"><i class="bi bi-check-circle-fill"></i> Selesai</span>
                        <?php else: ?>
                            <span class="badge-pill-custom badge-status-pending"><i class="bi bi-clock-history"></i> <?php echo e($sale->status); ?></span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="<?php echo e(route('penjualan.show', $sale)); ?>" class="btn btn-action-info btn-sm">
                                Detail
                            </a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>
                            <a href="<?php echo e(route('penjualan.edit', $sale)); ?>" class="btn btn-action-edit btn-sm">
                                Edit
                            </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                          <button class="btn btn-action-delete btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deletePenjualanModal" 
                                    data-penjualan-id="<?php echo e($sale->id); ?>"
                                    data-penjualan-name="Transaksi #<?php echo e($sale->id); ?>">
                                Hapus
                            </button>
                            <?php endif; ?>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5" style="color: #94a3b8 !important;">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Data penjualan tidak tersedia.
                        </td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
            </div>

            
            <div class="p-3 border-top border-secondary border-opacity-25 d-flex justify-content-end">
                <?php echo e($sales->links()); ?>

            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="deletePenjualanModal" tabindex="-1" aria-labelledby="deletePenjualanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background: #1e293b; border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 14px;">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-white d-flex align-items-center gap-2" id="deletePenjualanModalLabel">
          <i class="bi bi-exclamation-octagon-fill text-danger"></i> Konfirmasi Penghapusan
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-4" style="color: #cbd5e1 !important;">
        <p class="mb-1 fs-6">
          Apakah Anda yakin ingin menghapus penjualan <strong id="penjualanName" style="color: #fca5a5 !important;"></strong>?
        </p>
        <small style="color: #94a3b8 !important;"></small>
      </div>
      <div class="modal-footer border-0 pt-0 gap-2">
        <button type="button" class="btn btn-secondary btn-sm rounded-2" data-bs-dismiss="modal">
          Batal
        </button>
        <form id="deletePenjualanForm" method="POST" style="display: inline;">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit" class="btn btn-danger btn-sm rounded-2 fw-bold">
            Ya, Hapus Penjualan
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const deletePenjualanModal = document.getElementById('deletePenjualanModal');
  const penjualanNameElement = document.getElementById('penjualanName');
  const deletePenjualanForm = document.getElementById('deletePenjualanForm');

  deletePenjualanModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const penjualanId = button.getAttribute('data-penjualan-id');
    const penjualanName = button.getAttribute('data-penjualan-name');   
    
    penjualanNameElement.textContent = penjualanName;
    deletePenjualanForm.action = `/penjualan/${penjualanId}`;
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_manca-main\resources\views/penjualan/index.blade.php ENDPATH**/ ?>