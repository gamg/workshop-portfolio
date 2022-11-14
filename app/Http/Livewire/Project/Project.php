<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project as ProjectModel;

class Project extends Component
{
    public function render()
    {
        $projects = ProjectModel::get();
        return view('livewire..project.project', ['projects' => $projects]);
    }
}
