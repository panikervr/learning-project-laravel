<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->orderBy('id')->get();
        return view('pages.users.index', ['users' => $users]);
    }

    /**
     * Профиль пользователя
     */
    public function profile(User $user)
    {
        return view('pages.users.profile', ['user' => $user]);
    }
}
