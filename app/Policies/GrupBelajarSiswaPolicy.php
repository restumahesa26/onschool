<?php

namespace App\Policies;

use App\Models\GrupBelajarSiswa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupBelajarSiswaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, GrupBelajarSiswa $grupBelajarSiswa)
    {
        return $user->id === $grupBelajarSiswa->user_id;
    }
}
