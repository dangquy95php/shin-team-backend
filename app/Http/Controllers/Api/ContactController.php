<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use ShinTeam\Entity\Json\CreateEntity;
use App\Http\Requests\ContactRegisterRequest;
use ShinTeam\Repository\ContactRepository;

class ContactController
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function contactPost(ContactRegisterRequest $request)
    {
        $data        = $this->contactRepository->createRepository($request);
        $create_json = new CreateEntity;
        $create_json->setParamByResponse($data);
        $result      = $create_json->toJson();

        return $result;
    }
}