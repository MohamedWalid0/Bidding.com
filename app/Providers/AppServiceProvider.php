<?php

namespace App\Providers;

use App\Models\Bid;
use App\Models\Comment;
use App\Models\Reply;
use App\Observers\BidObserver;
use App\Observers\CommentObserver;
use App\Observers\ReplyObserver;
use App\View\Composers\CategoryAndSubCategoryComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\View;


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
        Bid::observe(BidObserver::class);
        Comment::observe(CommentObserver::class);
        Reply::observe(ReplyObserver::class);

        Paginator::useBootstrap();
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised();
        });

        View::composer('*', CategoryAndSubCategoryComposer::class);
    }
}
