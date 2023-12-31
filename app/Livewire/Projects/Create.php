<?php

namespace App\Livewire\Projects;

use App\Jobs\PublishProject;
use Livewire\Attributes\Rule;
use App\Models\Project;
use App\Notifications\ProjectPublishedNotification;
use App\Notifications\ProjectScheduledNotification;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use WithFileUploads, LivewireAlert;

    private $project = null;

    private $scheduleParsedDate = null;

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
	    $this->save();
        session()->flash('message', ['type' => 'success', 'text' => "Project <span class='text-bittersweet'>{$this->project->title}</span> saved as draft"]);
    }

    public function shouldBeScheduled()
    {
	    $this->scheduleParsedDate = Carbon::parse($this->scheduledAt);
	    return $this->scheduled && $this->scheduleParsedDate->isFuture();
    }

    public function publish()
    {
	    if ($this->shouldBeScheduled()) {
	        $this->schedule();
	        return;
	    }

	    $this->published = true;
	    $this->save();
	    $this->project->user->notify(new ProjectPublishedNotification($this->project));
        session()->flash('message', ['type' => 'success', 'text' => "Project <span class='text-bittersweet'>{$this->project->title}</span> was published"]);
    }

    public function schedule()
    {
	    $this->save();
	    dispatch(new PublishProject($this->project))->delay($this->scheduleParsedDate);
     	$this->project->user->notify(new ProjectScheduledNotification($this->project));
        session()->flash('message', ['type' => 'success', 'text' => "Project <span class='text-bittersweet'>{$this->project->title}</span> was scheduled to be published at <span class='text-manatee'>{$this->scheduleParsedDate->diffForHumans()} </span>"]);
    }

    public function save()
    {
	    $this->validate();

        $data = $this->only(['title', 'description', 'published']);

        $data['user_id'] = auth()->user()->id;

        $this->project = Project::create($data);

        $this->project
            ->addMedia($this->image)
            ->toMediaCollection('images');

        return $this->redirect('/projects', true);
    }

    public function render()
    {
        return view('livewire.projects.create')->extends('layouts.admin.projects');
    }
}
