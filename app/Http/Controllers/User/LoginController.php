<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('pages.login.login');
    }
    /**
     * Авторизация пост
     */
    public function store(LoginRequest $request)
    {

        if(Auth::attempt([
            'email'=> $request->input('email'),
            'password'=> $request->input('password')
        ], $request->has('remember')))
        {
            return redirect()->route('pages.home')->with('success', 'Авторизация прошла успешна');
        }

        return redirect()->back()->withErrors(['auth_error' => 'Некоректные данные']);
//        $user = User::whereEmail($request->input("email"))->first();
//        if ($user || Hash::check($request->input("password"), $user->password)) {
//            auth()->login($user, $request->filled('remember'));
//            return redirect()->intended(route('pages.home'));
//        }
    }
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
