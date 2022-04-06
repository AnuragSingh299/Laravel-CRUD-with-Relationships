<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

    class ProjectRepository implements ProjectRepositoryInterface
    {
        public function all()
        {
            $projects = Project::all();
            return $projects;
        }

        public function create($data)
        {
            return Project::create($data);
        }

        public function find($id) 
        {
            $project = Project::find($id);
            return $project;
        }

        public function update($id, $data)
        {
            $project = Project::find($id);
            $project->fill($data)->save();
            return $project;
        }

        public function delete($id)
        {
            return Project::find($id)->delete();
        }
        
    }
?>