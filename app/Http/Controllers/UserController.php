<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.users', [
            'users' => User::query()->orderBy('user_id')->get(),
            'activeCount' => User::query()->where('status', 'Active')->count(),
        ]);
    }
}
