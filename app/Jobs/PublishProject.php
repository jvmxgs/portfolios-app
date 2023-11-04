<?php

namespace App\Jobs;

use App\Notifications\ProjectPublishedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PublishProject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $project;

    /**
     * Create a new job instance.
     */
    public function __construct($project)
    {
        $this->project = $project;
        $this->onQueue('projects');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $project = $this->project;

        if (!$project->trashed) {
            $project->published = true;
            $project->published_at = now();
            $project->save();

            $user = $project->user;
            $user->notify(new ProjectPublishedNotification($project));
        }
    }
}
