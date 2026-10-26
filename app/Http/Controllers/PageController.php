<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'customerCount' => Customer::query()->count(),
            'userCount' => User::query()->count(),
            'activeCount' => Customer::query()->where('status', 'Active')->count()
                + User::query()->where('status', 'Active')->count(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
