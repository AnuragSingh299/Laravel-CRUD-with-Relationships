<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;
use App\Models\Account;

    class ContactRepository implements ContactRepositoryInterface
    {
        public function all()
        {
            $contacts = Contact::simplePaginate(5);
            return $contacts;
        }

        public function create($data)
        {
            return Contact::create($data);
        }

        public function find($id) 
        {
            $contact = Contact::find($id);
            return $contact;
        }

        public function update($id, $data)
        {
            $contact = Contact::find($id);
            $contact->fill($data)->save();
            return $contact;
        }

        public function delete($id)
        {
            return Contact::find($id)->delete();
        }

        // public function attach($aid, $cid) //$cid contact id
        // {
        //     $account = Account::find($aid);
        //     $account->contacts()->attach($cid);
        // }
    }
?>