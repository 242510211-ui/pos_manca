<?php

namespace App\Console\Commands;

use App\Models\Produk;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanDeleteableProduk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'produk:clean';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Hapus semua produk yang belum pernah terjual (produk yang bisa dihapus)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Mencari produk yang bisa dihapus...');

        // Cari semua produk yang tidak memiliki item penjualan
        $produksToDelete = Produk::whereDoesntHave('itemPenjualan')->get();

        if ($produksToDelete->isEmpty()) {
            $this->warn('⚠️  Tidak ada produk yang bisa dihapus.');
            return;
        }

        $count = $produksToDelete->count();
        $this->line("📦 Ditemukan {$count} produk yang bisa dihapus:");

        foreach ($produksToDelete as $produk) {
            $this->line("  - {$produk->nama} (ID: {$produk->id})");
        }

        $this->newLine();

        if (!$this->confirm('❓ Lanjutkan penghapusan?')) {
            $this->info('✅ Dibatalkan.');
            return;
        }

        $deleted = 0;
        $failed = 0;

        foreach ($produksToDelete as $produk) {
            try {
                // Hapus foto jika ada
                if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                    Storage::disk('public')->delete($produk->foto);
                }

                // Hapus produk
                $produk->delete();
                $deleted++;
                $this->line("  ✓ {$produk->nama}");
            } catch (\Exception $e) {
                $failed++;
                $this->error("  ✗ {$produk->nama} - Error: {$e->getMessage()}");
            }
        }

        $this->newLine();
        $this->info("✅ Selesai! Dihapus: {$deleted}, Gagal: {$failed}");
    }
}
