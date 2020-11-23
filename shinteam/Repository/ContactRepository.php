<?php

namespace ShinTeam\Repository;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use ShinTeam\Repository\AbstractEloquentRepository;

class ContactRepository extends AbstractEloquentRepository
{
    public $data = [];
    public $error = false;
        
    public function contactRepository($request)
    {
        // "Thank you for contacting us! We will contact you shortly.";
        try {
            $this->data = $this->create($request->only('email', 'name', 'note', 'address'));
        } catch(\Exception $e) {
            // Your contact with us has failed. Please contact us again!
            $this->message = $e->getMessage();
            $this->error = true;
        }

        return $this;
    }

    /**
    * get model
    * @return string
    */
    public function getModel()
    {
        return \App\Models\Contact::class;
    }

    // public function createRepository($request)
    // {
    //     $data = [
    //         'id'            => customerId($this->count()),
    //         'email'         => $request->input('email'),
    //         'first_name'    => $request->input('first_name'),
    //         'last_name'     => $request->input('last_name'),
    //         'password'      => Hash::make($request->input('password')),
    //         'status'        => self::USER_ACTIVED,
    //     ];
    //     try {
    //         $this->data = $this->create($data);
    //     } catch(\Exception $e) {
    //         $this->data['message'] = $e->getMessage();
    //         $this->data['status_response'] =  JsonResponse::HTTP_UNAVAILABLE_FOR_LEGAL_REASONS;
    //     }
        
    //     return $this;
    // }

    // public function getAllRepository($request)
    // {
    //     $limit = $request->get('limit', LIMIT_PAGE);
    //     $this->data = $this->paginate($limit);

    //     return $this;
    // }

    // public function detailCustomerRepository($request)
    // {
    //     try {
    //         $userId = JWTAuth::user()->id;
    //         $this->data = $this->find($userId);
    //     } catch(\Exception $e) {
    //         $this->data['message'] = $e->getMessage();
    //         $this->data['status_response'] = JsonResponse::HTTP_NOT_FOUND;
    //     }

    //     return $this;
    // }

    // public function loginRepository($request)
    // {   
    //     $option = [
    //         'email' => $request->get('email'),
    //         'password' => urldecode($request->get('password')),
    //     ];
    //     if (!$token = JWTAuth::attempt($option))
    //     {
    //         $this->data['status_response'] = JsonResponse::HTTP_NOT_FOUND;
    //         $this->data['message'] =  'Login_404';
    //     } else {
    //         $this->data['token'] = $token;
    //     }

    //     return $this;
    // }
}