<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\Request;

use App\Models\Account;

class ContactController extends Controller
{
    public function __construct(ContactRepositoryInterface $contact)
    {
        $this->contactRepo = $contact;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index', ['contacts' => $this->contactRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        $this->contactRepo->create($data);
        // $accountId = $request->input('account');
        // $customerId = $this->contactRepo->find($request->id);
        // $this->contactRepo->attach($accountId, $customerId);
        
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('contact.show', ['contact' => $this->contactRepo->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('contact.edit', ['contact' => $this->contactRepo->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $data = $request->validated();
        $this->contactRepo->update($id, $data);
        //  $contact = Contact::find($id);
        //  $contact->accounts()->attach($request->accounts); //testing relations
        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->contactRepo->delete($id);
        return redirect()->route('contact.index');
    } 

    // public function select_account(Request $request, $contactId)
    // {
    //     $contact = Account::find($contactId);
    //     foreach ($request->accounts as $accountId)
    //     {
    //         $contact->accounts()->attach($accountId);
    //     }
    //     return redirect()->route('contact.index');
    // }
}
