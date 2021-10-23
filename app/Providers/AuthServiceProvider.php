<?php

namespace App\Providers;

use App\Models\GrupBelajar;
use App\Models\GrupBelajarPengumumanKomentar;
use App\Models\GrupBelajarSiswa;
use App\Policies\GrupBelajarPengumumanKomentarPolicy;
use App\Policies\GrupBelajarPolicy;
use App\Policies\GrupBelajarSiswaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        GrupBelajarSiswa::class => GrupBelajarSiswaPolicy::class,
        GrupBelajarPengumumanKomentar::class => GrupBelajarPengumumanKomentarPolicy::class,
        GrupBelajar::class => GrupBelajarPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
