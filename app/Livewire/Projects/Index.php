<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $projects = ModelsProject::orderBy('id', 'desc')->paginate(9);

        return view('livewire.projects.index', compact('projects'))->extends('layouts.admin');
    }
}
