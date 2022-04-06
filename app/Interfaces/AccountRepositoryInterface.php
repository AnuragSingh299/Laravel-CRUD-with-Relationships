<?php

namespace App\Interfaces;

use App\Models\Account;
use PhpParser\Node\Expr\FuncCall;

interface AccountRepositoryInterface
{
    public function all($select = NULL);//index
    public function create($data);//store
    public function find($id);//edit and show
    public function update($id, $data);//update
    public function delete($id);//destroy

    // public function showContacts();
    // public function attach($id); //attach to contact
    // public function removeContacts();
}

?>