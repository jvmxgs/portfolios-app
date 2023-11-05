<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;

    #[On('deleteProject')]
    public function deleteProject($id)
    {
        ModelsProject::find($id)->delete();
    }

    public function mount()
    {
        if (session()->has('message')) {
            $message = session('message');
            $this->alert($message['type'], $message['text']);
        }
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
