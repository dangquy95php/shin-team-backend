<?php

namespace ShinTeam\Repository;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use ShinTeam\Repository\AbstractEloquentRepository;
use App\Jobs\SendEmail;

class ContactRepository extends AbstractEloquentRepository
{
    public $data = [];
    public $error = false;
    public $type_toastr = 'success';
        
    public function createRepository($request)
    {
        // "Thank you for contacting us! We will contact you shortly.";
        $data = [
            'email'         => $request->input('email'),
            'name'          => $request->input('name'),
            'note'          => $request->input('note'),
            'address'       => $request->input('address'),
        ];
        try {
            $this->data = $this->create($data);
        } catch(\Exception $e) {
            $this->data['message'] = $e->getMessage();
            $this->data['status_response'] =  JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
        }
        
        try {
            if (!isset($this->data['status_response']))
            {
                $options = [
                    'title' => 'Comfirm email',
                    'to_email' => $request->input('email'),
                    'name' => 'Shin Team'
                ];
    
                SendEmail::dispatch($options, ['email' => $request->input('email')])->delay(now()->addSeconds(10));
            }
        } catch(\Exception $e) {
            $this->data['message'] = $e->getMessage();
            $this->data['status_response'] =  JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
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

    public function listRepository()
    {
        return $this->all(['name', 'email', 'address', 'id', 'note']);
    }

    
    public function updateRepository($id)
    {
        return $this->find($id, ['name', 'email', 'address', 'note']);
    }

    public function updatePostRepository($id, $request)
    {
        $data = $request->only('name', 'address', 'note');
        try {
            $this->message = 'Updated contact successfully!';
            $contact = $this->update($id, $data);
            if (!$contact->wasChanged()) {
                $this->message = 'The contact may not change!';
                $this->type_toastr = 'error';
            }
        } catch(\Exception $e) {
            $this->message =  $e->getMessage();
            $this->type_toastr = 'error';
        }

        return $this;
    }

    public function deleteRepository($id)
    {
        try {
            $this->data = $this->delete($id);
            $this->message = 'Deleted contact successfully!';
        } catch (\Exception $e) {
            $this->message =  $e->getMessage();
            $this->type_toastr = 'error';
        }
    
        return $this;
    }

    public function searchRepository($request)
    {
        return Contact::search($request->input('search'))->select(['id', 'name', 'email', 'address', 'note'])->get();
    }
}