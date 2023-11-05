<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Index extends Component
{
    use WithPagination, Actions;

    #[On('deleteProject')]
    public function deleteProject($id)
    {
        ModelsProject::find($id)->delete();
    }

    #[On('projectSavedAsDraft')]
    public function projectSavedAsDraft()
    {
	$this->notification()->success('Project saved', 'Your project was saved successfully as draft');
	info('project saved as draft');
    }

    public function openPopup()
    {
        $this->dispatch('openPopup');
    }

    public function render()
    {
        $projects = ModelsProject::query()
            ->where('user_id', auth()->user()->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        return view('livewire.projects.index', compact('projects'))->extends('layouts.admin.projects');
    }
}
