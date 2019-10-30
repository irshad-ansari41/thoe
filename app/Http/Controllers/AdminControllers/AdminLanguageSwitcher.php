<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Session;
use Illuminate\Support\Facades\Config;

class AdminLanguageSwitcher {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        App::setLocale(Session::has('locale') ? Session::get('locale') : Config::get('app.locale'));

        if (!Session::has('locale')) {
            Session::put('locale', $request->lang);
        } else {
            Session::forget('locale');
            Session::put('locale', $request->lang);
        }
        return $next($request);
    }

}
