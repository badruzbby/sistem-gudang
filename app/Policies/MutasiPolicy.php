<?php

namespace App\Policies;

use App\Models\Mutasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MutasiPolicy
{
    public function modify(User $user, Mutasi $mutasi): Response
    {
        return $user->id === $mutasi->user_id
            ? Response::allow()
            : Response::deny('Anda tidak diperbolehkan mengubah mutasi ini.');
    }
}
