<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRegisterRequest;
use ShinTeam\Repository\ContactRepository;

class ContactController
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function postInfo(ContactRegisterRequest $request)
    {
        $data = $this->contactRepository->contactRepository($request);

        return view("index", [ "result" => $data ]);
    }
}