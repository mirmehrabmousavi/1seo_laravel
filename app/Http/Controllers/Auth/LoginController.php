<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Providers\RouteServiceProvider;
use http\Client\Curl\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin');
            }else{
                $url = auth()->user()->url;
                $email = auth()->user()->email;
                $site = Site::where('sites',$url)->get();
               if(!Str::contains($site, $url)) {
                    Site::create([
                        'sites' => $url,
                        'user_id' => $email
                    ]);
                }
                return redirect()->route('home',['url' => $url]);
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }
    }
}
