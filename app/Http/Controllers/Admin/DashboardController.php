<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginCustomerRequest;

class DashboardController
{
    protected $customerRepository;

    public function __construct()
    {

    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}