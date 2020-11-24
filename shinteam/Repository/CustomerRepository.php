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
}