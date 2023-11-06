<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use App\Notifications\ProjectDeletedNotification;
use App\Notifications\ProjectRestoredNotification;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Trashed extends Component
{
    use LivewireAlert;

    private $toRestore = [];

    private $toDelete = [];

    #[On('restoreSelected')]
    public function restoreSelected($items = [])
    {
        $user = auth()->user();
        $projects = Project::withTrashed()->whereIn('id', $items)->get();
        $projects->each->restore();

        $this->alert('success', count($items) . " projects restored successfully");
        $projectNames = $projects->pluck('title')->all();
        $user->notify(new ProjectRestoredNotification($projectNames));
    }

    #[On('deletePermanentlySelected')]
    public function deletePermanentlySelected($items = [])
    {
        $user = auth()->user();
        $projects = Project::withTrashed()->whereIn('id', $items)->get();
        $projectNames = $projects->pluck('title')->all();
        $projects->each->forceDelete();

        $this->alert('success', count($items) . " projects deleted successfully");
        $user->notify(new ProjectDeletedNotification($projectNames));
    }

    public function render()
    {
        $user = auth()->user();

        $projects = $user->trashedProjects()->paginate(9);

        return view('livewire.projects.trashed', compact('projects'))->extends('layouts.admin.projects');
    }
}
