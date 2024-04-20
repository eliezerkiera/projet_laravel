<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponstContract;
use App\Http\Responses\RegisterResponse;
use Laravel\Fortify\Contracts\PasswordUpdateResponse as PasswordUpdateResponseContract;
use App\Http\Responses\PasswordUpdateResponse;
use App\Traits\PageParamsView;

class FortifyServiceProvider extends ServiceProvider
{

    use PageParamsView;
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

        Fortify::loginView(function () {
            return view('auth.login')->with('pageParams',$this->getPageParams());
        });

        Fortify::registerView(function () {
            return view('auth.register')->with('pageParams',$this->getPageParams());
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password')->with('pageParams',$this->getPageParams());
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request])->with('pageParams',$this->getPageParams());
        });

         Fortify::verifyEmailView(function () {
             return view('auth.verify-email')->with('pageParams',$this->getPageParams());
         });

         Fortify::confirmPasswordView(function () {
             return view('auth.confirm-password')->with('pageParams',$this->getPageParams());
         });


        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });




        $this->app->singleton(RegisterResponstContract::class, RegisterResponse::class);
        $this->app->singleton(PasswordUpdateResponseContract::class, PasswordUpdateResponse::class);
    }
}
