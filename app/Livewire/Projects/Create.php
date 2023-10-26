<?php

namespace App\Livewire\Projects;

use Livewire\Attributes\Rule;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $description = '';

    #[Rule('required')]
    public $image = '';

    public $published = false;

    public function save()
    {
        $this->validate();

        $data = $this->only(['title', 'description', 'published']);

        $data['user_id'] = auth()->user()->id;

        $project = Project::create($data);

        $project
            ->addMedia($this->image)
            ->toMediaCollection('images');

        return $this->redirect('/projects');
    }

    public function render()
    {
        return view('livewire.projects.create')->extends('layouts.admin');
    }
}
