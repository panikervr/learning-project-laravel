<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('pages.register.register');
    }
    /**
     * Ниже идут пост запросы store регистрация
     **/
    public function store(RegisterRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('login')->with('success', 'Вы успешно зарегистрировались!');
    }
}
