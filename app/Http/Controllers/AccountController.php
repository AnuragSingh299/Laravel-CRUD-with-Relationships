<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Interfaces\AccountRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function __construct(AccountRepositoryInterface $account)
    {
        $this->accountRepo = $account;
    }
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index', ['accounts' => $this->accountRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
        //Alert::success('You have registered successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        $data = $request->validated();
        $this->accountRepo->create($data);
        return redirect()->route('account.index');
        Alert::success('You have registered successfully');
        //rel
        //$account = Account::find()
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('account.show', ['account' => $this->accountRepo->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('account.edit', ['account' => $this->accountRepo->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountRequest  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id)
    {
        $data = $request->validated();
        $this->accountRepo->update($id, $data);
        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->accountRepo->delete($id);
        return redirect()->route('account.index');
        Alert::success('Deleted successfully');
    }
}
