<?php

namespace App\Livewire\Projects;

use Livewire\Attributes\Rule;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $project;

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $description;

    public $image = false;

    public $published = false;

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);

        $this->title = $this->project->title;
        $this->description = $this->project->description;
        $this->published = $this->project->published === 1;
    }

    public function update()
    {
        $this->validate();

        $this->project->update(
            $this->only(['title', 'description', 'published'])
        );

        if ($this->image) {
            $this->project
                ->addMedia($this->image)
                ->toMediaCollection('images');
        }

        return $this->redirect('/projects');
    }

    public function render()
    {
        return view('livewire.projects.edit')->extends('layouts.admin.default');
    }
}
