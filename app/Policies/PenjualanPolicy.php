<?php

namespace App\Policies;

use App\Models\Penjualan;
use App\Models\User;

class PenjualanPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Penjualan $penjualan): bool
    {
        // Izinkan jika pengguna adalah 'admin' ATAU 'kasir'
        return in_array($user->role->name, ['admin', 'kasir']);
    }
}