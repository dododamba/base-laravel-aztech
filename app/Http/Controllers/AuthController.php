<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function login() {

      return Auth::guard('web')
                       ->check() ? 
                       redirect()
                       ->route('dashboard') : view('web/home');
    }

    public function postLogin(Request $request) {
        dd($request);
        return Auth::guard('web')
                     ->attempt([
                         'email' => $request->email,
                         'password' => $request->password,
                        ]
                             ) ? redirect()
                                ->route('dashboard')
                                ->with('success','Bienvenu dans votre tableau de bord ')
                 : redirect()
                     ->route('login')
                     ->with('error','Indentifiant incorrect, veuillez réesayer ou contactez les administrateurs');
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('main');
    }

    public function postRegister(Request $request)
    {
       /* $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
*/
        $user = 'Dodo';
        Mail::to($request->email)->send(new WelcomeMail($user));


        
    }
}
