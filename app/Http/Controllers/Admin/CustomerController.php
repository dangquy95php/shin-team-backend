<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginCustomerRequest;
use ShinTeam\Repository\CustomerRepository;

class CustomerController
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function interfaceLogin()
    {
        return view('admin.login');
    }

    /**
    * Only allow login is email
    * Not use phone login
    */
    public function loginCustomer(LoginCustomerRequest $request)
    {
        $data = $this->customerRepository->loginRepository($request);
        if ($data === 1) {
            return redirect('/')->with(['success' => 'Login successfully']);
        } elseif($data == 2){
            return redirect('/')->with(['success' => 'Login successfully']);
        } else {
            return redirect('/login')->with(['error' => 'Login unsuccessful!']);
        }
    }
}