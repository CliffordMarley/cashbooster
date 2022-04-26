<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Group;
use App\Models\User;
use App\Observers\UserObserver;
use App\Observers\GroupObserver;
use App\Models\Player;
use App\Observers\PlayerObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Player::observe(PlayerObserver::class);
        Group::observe(GroupObserver::class);

        Schema::defaultStringLength(200);
    }
}
