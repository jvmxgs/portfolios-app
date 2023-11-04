<?php

namespace App\Livewire\Projects;

use App\Jobs\PublishProject;
use Livewire\Attributes\Rule;
use App\Models\Project;
use App\Notifications\ProjectPublishedNotification;
use App\Notifications\ProjectScheduledNotification;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Create extends Component
{
    use WithFileUploads, Actions;

    private $project = null;

    public $published = false;

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $description = '';

    #[Rule('required')]
    public $image = '';

    #[Rule('required_if:scheduled,true', 'Publish date')]
    public $scheduledAt = null;

    public bool $scheduled = false;

    public function checkboxToogle()
    {
        $this->scheduled = ! $this->scheduled;
    }

    public function saveDraft()
    {
        $this->scheduled = false;
        $this->notification()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'
        );
        session()->flash('message', 'This is a flash message.');
        $this->save();
    }

    public function publish()
    {
        $this->published = true;
        $this->save();

        if (! $this->scheduled) {
            $this->project->user->notify(new ProjectPublishedNotification($this->project));
        }
    }

    public function save()
    {
        $this->validate();

        $data = $this->only(['title', 'description', 'published']);

        $data['user_id'] = auth()->user()->id;

        $this->project = Project::create($data);

        if ($this->scheduled) {
            dispatch(new PublishProject($this->project))->delay(Date::parse($this->scheduledAt));
            $this->project->user->notify(new ProjectScheduledNotification($this->project));
        }

        $this->project
            ->addMedia($this->image)
            ->toMediaCollection('images');

        return $this->redirect('/projects');
    }

    public function render()
    {
        return view('livewire.projects.create')->extends('layouts.admin.projects');
    }
}
