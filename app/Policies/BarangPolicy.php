<?php

namespace App\Policies;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BarangPolicy
{
    public function modify(User $user, Barang $barang): Response
    {
        return $user->id === $barang->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diperbolehkan mengubah barang ini.');
    }
}
