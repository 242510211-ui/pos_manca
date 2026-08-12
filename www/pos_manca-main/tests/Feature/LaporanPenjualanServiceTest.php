<?php

namespace Tests\Feature;

use App\Models\Penjualan;
use App\Models\Role;
use App\Models\User;
use App\Services\LaporanPenjualanService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaporanPenjualanServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_ringkasan_hari_ini_menghitung_transaksi_yang_selesai_hari_ini_meski_dibuat_sebelumnya(): void
    {
        $role = Role::create(['name' => 'admin']);
        $user = User::factory()->create(['role_id' => $role->id]);

        Penjualan::create([
            'user_id' => $user->id,
            'total_pembayaran' => 50000,
            'metode_pembayaran' => 'CASH',
            'status' => 'COMPLETED',
            'created_at' => now()->subDay(),
            'updated_at' => now(),
        ]);

        $service = new LaporanPenjualanService();
        $ringkasan = $service->ringkasanHariIni();

        $this->assertSame(1, $ringkasan['total_transaksi']);
        $this->assertSame(50000.0, $ringkasan['total_penjualan']);
    }
}
