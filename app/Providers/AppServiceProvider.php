<?php

namespace App\Providers;
use View;
use Auth;
use Illuminate\Support\ServiceProvider;
use App\Nontification;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentRequest;

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
        View::composer('*', function($view)
        {
            if (Auth::check()){


            $userId = Auth::user()->id;
            $count = Nontification::where('user_id','=',$userId)->count();
            $nonti = Nontification::where('user_id','=',$userId)->get();
            $view->with([
                'badge'=>$count,
                'nonti'=>$nonti
                ]);
            }
    });

        //$count = Nontification::count()->where('user_id','=',$userId);
        View::share([

            'badge2'=>'3'
        ]);

    }
}
