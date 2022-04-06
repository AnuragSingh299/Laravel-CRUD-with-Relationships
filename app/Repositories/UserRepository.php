<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

    class UserRepository implements UserRepositoryInterface
    {
        public function all()
        {
            $users = User::all();
            return $users;
        }

        public function create($data)
        {
            return User::create($data);
        }

        public function find($id) 
        {
            $user = User::find($id);
            return $user;
        }

        public function update($id, $data)
        {
            $user = User::find($id);
            $user->fill($data)->save();
            return $user;
        }

        public function delete($id)
        {
            return User::find($id)->delete();
        }
        
    }
?>