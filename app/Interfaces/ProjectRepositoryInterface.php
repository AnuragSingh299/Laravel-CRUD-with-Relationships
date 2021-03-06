<?php

namespace App\Interfaces;

use App\Models\Project;

interface ProjectRepositoryInterface
{
    public function all();//index
    public function create($data);//store
    public function find($id);//edit and show
    public function update($id, $data);//update
    public function delete($id);//destroy
}

?>