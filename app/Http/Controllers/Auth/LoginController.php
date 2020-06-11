<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());
        return view('auth.login');
    }

    public function redirectTo()
    {
        // dd(session()->get('previousUrl'));
        return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();


        $authUser = $this->findOrCreateUser($user, $provider);

        if ($authUser) {
            Auth::login($authUser, true);

            return redirect($this->redirectTo);
        } else {
            return redirect('/login')->with(['error' => 'Maaf email anda sudah terdaftar']);
        }
    }

    public function findOrCreateUser($user, $provider)
    {
        $userAuth = User::where('provider_id', $user->getId())->first();
        $userProvider = User::where('email', $user->getEmail())->first();
        if ($userAuth) {
            return $userAuth;
        } else if (!$userProvider) {
            // add user to database
            $data = User::create([
                'email'         =>  $user->getEmail(),
                'name'          =>  $user->getName(),
                'provider_id'   =>  $user->getId(),
                'provider'      =>  $provider
            ]);

            return $data;
        } else {
            return false;
        }
    }
}
