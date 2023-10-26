<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class Liked extends Component
{
    #[On('toogleLike')]
    public function toogleLike($id)
    {
        $project = Project::find($id);
        $user = auth()->user();

        if ($user->likes->contains('project_id', $project->id)) {
            $user->likes()->where('project_id', $project->id)->delete();
        } else {
            $like = new Like([
                'project_id' => $project->id,
                'user_id' => $user->id,
            ]);
            $like->save();
        }
    }

    public function render()
    {
        $user = auth()->user();

        $projects = $user->likedProjects()->paginate(9);

        return view('livewire.liked', compact('projects'))->extends('layouts.admin');
    }
}
