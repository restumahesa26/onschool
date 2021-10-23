<?php

namespace App\Policies;

use App\Models\GrupBelajarPengumumanKomentar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupBelajarPengumumanKomentarPolicy
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

    public function view(User $user, GrupBelajarPengumumanKomentar $grupBelajarPengumumanKomentar)
    {
        return $user->id === $grupBelajarPengumumanKomentar->user_id;
    }

    public function update(User $user, GrupBelajarPengumumanKomentar $grupBelajarPengumumanKomentar)
    {
        return $user->id === $grupBelajarPengumumanKomentar->user_id;
    }

    public function delete(User $user, GrupBelajarPengumumanKomentar $grupBelajarPengumumanKomentar)
    {
        return $user->id === $grupBelajarPengumumanKomentar->user_id;
    }
}
