<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class LaporanPenjualanService
{
public function ringkasanHariIni(): array
{
    $data = DB::table('penjualan')
        ->whereDate('updated_at', Carbon::today())
        ->where('status', 'COMPLETED')
        ->selectRaw('
            COUNT(*) as total_transaksi,
            SUM(total_pembayaran) as total_penjualan,
            SUM(CASE WHEN metode_pembayaran = "CASH" THEN total_pembayaran ELSE 0 END) as total_cash,
            SUM(CASE WHEN metode_pembayaran != "CASH" THEN total_pembayaran ELSE 0 END) as total_non_tunai
        ')
        ->first();

    return [
        'total_transaksi'   => (int) ($data->total_transaksi ?? 0),
        'total_penjualan'   => (float) ($data->total_penjualan ?? 0),
        'total_cash'        => (float) ($data->total_cash ?? 0),
        'total_non_tunai'   => (float) ($data->total_non_tunai ?? 0),
    ];
}
   public function produkTerlarisHariIni()
{
    return DB::table('item_penjualan')
        ->join('penjualan', 'penjualan.id', '=', 'item_penjualan.penjualan_id')
        ->join('produk', 'produk.id', '=', 'item_penjualan.produk_id')
        ->select(
            'produk.nama',
            'produk.stok',
            DB::raw('SUM(item_penjualan.kuantitas) as total_terjual')
        )
        ->whereDate('penjualan.updated_at', Carbon::today())
        ->where('penjualan.status', 'COMPLETED')
        ->groupBy(
            'produk.id',
            'produk.nama',
            'produk.stok'
        )
        ->orderByDesc('total_terjual')
        ->limit(5)
        ->get();
}
}

