<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRegisterRequest;
use App\Http\Requests\UpdateContactRequest;
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

    public function list()
    {
        $data = $this->contactRepository->listRepository();

        return view('admin.contact.list', ['contacts' => $data]);
    }

    public function update($id)
    {
        $data = $this->contactRepository->updateRepository($id);
    
        return view('admin.contact.edit', compact('data'));
    }
    
    public function updatePost($id, UpdateContactRequest $request)
    {
        $data = $this->contactRepository->updatePostRepository($id, $request);
        $type = $data->type_toastr;
        toastr()->$type($data->message);
        if ($data->type_toastr == 'success') {
            return redirect()->route('admin_list_contact');
        }

        return redirect()->back()->withInput();
    }

    public function delete($id)
    {
        $data = $this->contactRepository->deleteRepository($id);
        $type = $data->type_toastr;
        toastr()->$type($data->message);

        return redirect()->route('admin_list_contact');
    }
}