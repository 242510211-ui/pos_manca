<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'POS App'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        /* 🔴 KUNCI AGAR NAVBAR & CONTENT BISA 100% FULL WIDTH */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
            overflow-x: hidden; /* Mencegah scrollbar horizontal berlebih */
            background-color: #0d0f12 !important;
        }

        #app, main {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }
    </style>
</head>
<body>

    <main id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Modal Konfirmasi Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e293b; color: #f1f5f9; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 14px; box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
                
                <div class="modal-header" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                    <h5 class="modal-title fw-bold" id="logoutModalLabel" style="color: #f8fafc;">
                        <i class="bi bi-box-arrow-right me-2 text-warning"></i>Konfirmasi Logout
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body p-4 text-start">
                    <p class="mb-0" style="color: #f1f5f9; font-size: 1rem;">
                        Apakah Anda yakin ingin keluar dari aplikasi POS?
                    </p>
                </div>
                
                <div class="modal-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.1); gap: 10px;">
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal" style="border-radius: 8px; font-weight: 500;">
                        Batal
                    </button>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm px-3" style="border-radius: 8px; font-weight: 600;">
                            Ya, Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari semua elemen alert yang muncul
            const alerts = document.querySelectorAll('.alert');
            
            alerts.forEach(function(alert) {
                // Set waktu dalam milidetik (misal: 3000 = 3 detik)
                setTimeout(function() {
                    // Tambahkan efek transisi halus jika ada class fade, atau langsung hilangkan
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    
                    // Hapus elemen dari DOM setelah transisi selesai
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 3000); // Alert akan otomatis hilang setelah 3 detik
            });
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\pos_manca\resources\views/layouts/app.blade.php ENDPATH**/ ?>