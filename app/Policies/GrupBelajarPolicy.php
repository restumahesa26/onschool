<?php

namespace App\Policies;

use App\Models\GrupBelajar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupBelajarPolicy
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

    public function view(User $user, GrupBelajar $grupBelajar)
    {
        return $user->id === $grupBelajar->user_id;
    }

    public function store(User $user, GrupBelajar $grupBelajar)
    {
        return $user->id === $grupBelajar->user_id;
    }
}
