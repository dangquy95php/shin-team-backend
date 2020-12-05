<?php

namespace ShinTeam\Repository;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use ShinTeam\Repository\AbstractEloquentRepository;

class CustomerRepository extends AbstractEloquentRepository
{
    const USER_ACTIVED     = 1;
    const PERMISSION_ADMIN = 2;
    const PERMISSION_USER  = 1;
    const ROLE_CUSTOMER    = 1;
    CONST ROLE_ADMIN       = 2;

    public $data = [];
    public $type_toastr = 'success';

     /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Customer::class;
    }

    public function loginRepository($request)
    {   
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => self::ROLE_CUSTOMER,
        ];

        $remember = $request->input('remember', false);
        if ($isCustomer = Auth::attempt($login, $remember)) {
            return self::ROLE_CUSTOMER;
        } else {
            if (!$isCustomer) {
                $login = array_merge($login, ['role' => self::ROLE_ADMIN]);
                if(Auth::attempt($login)) {
                    return self::ROLE_ADMIN;
                }
            }

            return false;
        }
    }

    public function listRepository()
    {
        return $this->all(['name', 'email', 'address', 'id', 'role', 'status']);
    }

    public function createRepository($request)
    {
        $data = [
            'email'    => $request->input('email'),
            'address'  => $request->input('address'),
            'name'     => $request->input('name'),
            'role'     => $request->input('role'),
            'password' => bcrypt($request->input('password')),
            'status'   => $request->input('status'),
        ];
        
        try {
            $this->data = $this->create($data);
            $this->message = 'Created customer successfully!';
        } catch(\Exception $e) {
            $this->message = $e->getMessage();
            $this->type_toastr = 'error';
        }
        
        return $this;
    }

    public function deleteRepository($id)
    {
        try {
            $this->data = $this->delete($id);
            $this->message = 'Deleted customer successfully!';
        } catch (\Exception $e) {
            $this->message =  $e->getMessage();
            $this->type_toastr = 'error';
        }
    
        return $this;
    }

    public function updateRepository($id)
    {
        return $this->find($id, ['name', 'email', 'address', 'status', 'role']);
    }

    public function updatePostRepository($id, $request)
    {
        $data = $request->only('name', 'address', 'status', 'role');
        try {
            $this->message = 'Updated customer successfully!';
            $customer = $this->update($id, $data);
            if (!$customer->wasChanged()) {
                $this->message = 'The customer may not change!';
                $this->type_toastr = 'error';
            }
        } catch(\Exception $e) {
            $this->message =  $e->getMessage();
            $this->type_toastr = 'error';
        }

        return $this;
    }

    public function searchRepository($request)
    {
        return Customer::search($request->input('search'))->select(['id', 'name', 'email', 'role', 'status', 'address'])->get();
    }
}
   