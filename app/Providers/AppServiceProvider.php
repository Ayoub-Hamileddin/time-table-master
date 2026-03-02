<?php

namespace App\Providers;

use App\Models\Filiere;
use App\Models\Groupe;
use App\Policies\FilierePolicy;
use App\Policies\GroupePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Filiere::class,FilierePolicy::class );
        Gate::policy(Groupe::class,GroupePolicy::class );
    }
}
