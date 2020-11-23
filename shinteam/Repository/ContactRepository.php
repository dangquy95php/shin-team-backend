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
            // 
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
}