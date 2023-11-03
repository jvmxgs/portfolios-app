<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{

    #[On('toogleLike')]
    public function toogleLike($id)
    {
        $user = auth()->user();

        if (!$user) {
            return $this->redirect('/login');
        }

        $project = Project::find($id);

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

    #[On('search')]
    public function search($text)
    {
        info($text);
    }

    public function render()
    {
        $projects = Project::query()
            ->with('user')
            ->where('published', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        return view('livewire.home', compact('projects'))->extends('layouts.admin.default');
    }
}
