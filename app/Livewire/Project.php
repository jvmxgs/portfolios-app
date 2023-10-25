<?php

namespace App\Livewire;

use App\Models\Project as ModelsProject;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    use WithPagination;

    public function render()
    {
        $projects = ModelsProject::paginate(10);

        return view('livewire.project', compact('projects'))->extends('layouts.admin');
    }
}
