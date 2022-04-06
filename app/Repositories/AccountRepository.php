<?php

namespace App\Repositories;

use App\Interfaces\AccountRepositoryInterface;
use App\Models\Account;

    class AccountRepository implements AccountRepositoryInterface
    {
        public function all($select = NULL)
        {
            if($select != NULL)
            {
                $accounts = Account::all($select);
            }
            else
            {
                $accounts = Account::simplePaginate(5);
            }
            return $accounts;
        }

        public function create($data)
        {
           return Account::create($data);
        }

        public function find($id) 
        {
            $account = Account::find($id);
            return $account;
        }

        public function update($id, $data)
        {
            $account = Account::find($id);
            $account->fill($data)->save();
            return $account;
        }

        public function delete($id)
        {
            return Account::find($id)->delete();
        }
        

        // public function attach($id)
        // {
        //     $account = Account::find($id);
        //     $account->contacts()->attach($id);
        // }
    }
?>