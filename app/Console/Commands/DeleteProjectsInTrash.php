<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectDeletedAutomaticallyNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteProjectsInTrash extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-projects-in-trash';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete projects in the trash that are 30 days old';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $thresholdDate = Carbon::now()->subDays(30);

        $deletedProjectsByUser = Project::onlyTrashed()
            ->where('deleted_at', '<=', $thresholdDate)
            ->get()
            ->groupBy('user_id');

        $deletedProjectCount = 0;

        foreach ($deletedProjectsByUser as $userId => $projects) {
            $user = User::find($userId);
            $projectNames = $projects->pluck('title')->all();
            $user->notify(new ProjectDeletedAutomaticallyNotification($projectNames));

            $projects->each(function ($project) {
                $project->forceDelete();
            });

            $deletedProjectCount += $projects->count();
        }

        $this->info("Deleted {$deletedProjectCount} projects from the trash.");
    }
}
