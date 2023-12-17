<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\User;
use App\Follow;

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
        //まとめてフォロー数フォロワー数を送る
        View::composer('layouts.login', function ($view) {
            $followCount = Follow::where('following_id', auth()->user()->id)->count();
            $followerCount = Follow::where('followed_id', auth()->user()->id)->count();

            $view->with([
                'follow_count' => $followCount,
                'follower_count' => $followerCount
            ]);
        });
    }
}
