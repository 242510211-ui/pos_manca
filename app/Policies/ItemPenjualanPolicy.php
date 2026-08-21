<?php

namespace App\Policies;

use App\Models\ItemPenjualan;
use App\Models\User;

class ItemPenjualanPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ItemPenjualan $itempenjualan): bool
    {
        // Izinkan jika pengguna adalah 'admin' ATAU 'kasir'
        return in_array($user->role->name, ['admin', 'kasir']);
    }
}