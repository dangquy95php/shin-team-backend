<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginCustomerRequest;
use App\Http\Requests\CreateCustomerRequest;
use ShinTeam\Repository\CustomerRepository;
use Toastr;

class CustomerController
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function loginForm()
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
            return redirect('/admin')->with(['success' => 'Login successfully']);
        } else {
            return redirect('/login')->with(['error' => 'Login unsuccessful!']);
        }
    }

    public function listCustomer()
    {
        $data = $this->customerRepository->listRepository();

        return view('admin.customers.list', ['custonmers' => $data]);
    }

    public function addCustomer()
    {
        return view('admin.customers.add');
    }

    public function addCustomerPost(CreateCustomerRequest $request)
    {
        $data = $this->customerRepository->createRepository($request);
        $type = $data->type_toastr;
        toastr()->$type($data->message);

        return redirect()->route('admin_list_customer');
    }
}