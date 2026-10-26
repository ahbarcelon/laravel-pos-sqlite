<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('pages.customers', [
            'customers' => Customer::query()->orderBy('customer_id')->get(),
            'activeCount' => Customer::query()->where('status', 'Active')->count(),
        ]);
    }
}
