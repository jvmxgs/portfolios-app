<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $projects = Project::orderBy('updated_at', 'desc')->paginate(9);

        return view('livewire.home', compact('projects'))->extends('layouts.admin');
    }
}
