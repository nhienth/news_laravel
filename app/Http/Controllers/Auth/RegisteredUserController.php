<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_img' => ['required', 'string', 'max:255'],
        ]);

        $user = Users::create([
            'user_fullname' => $request->user_fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_img' => $request->user_img,
            'user_status' => 1,
            'user_rolename' => 'customer',
            'remember_token' => ''
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
