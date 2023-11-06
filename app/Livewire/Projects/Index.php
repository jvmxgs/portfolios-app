<?php

namespace App\Livewire\Projects;

use App\Models\Project as ModelsProject;
use App\Notifications\ProjectMovedToTrashNotification;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;

    #[On('deleteSelectedProjects')]
    public function deleteSelectedProjects($data)
    {
        $user = auth()->user();
        $projects = ModelsProject::whereIn('id', $data)->get();

        $projects->each->delete();

        $this->alert('success', count($data) . " projects moved to trash successfully");
        $projectNames = $projects->pluck('title')->all();
        $user->notify(new ProjectMovedToTrashNotification($projectNames));
    }

    public function mount()
    {
        if (session()->has('message')) {
            $message = session('message');
            $this->alert($message['type'], $message['text']);
        }
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
