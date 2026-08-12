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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

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
</html><?php /**PATH C:\laragon\www\pos_manca-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>