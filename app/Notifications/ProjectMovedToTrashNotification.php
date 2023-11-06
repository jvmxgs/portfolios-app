<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ProjectMovedToTrashNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $projectNames;

    /**
     * Create a new notification instance.
     */
    public function __construct($projectNames)
    {
        $this->projectNames = $projectNames;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $listItems = '';
        foreach ($this->projectNames as $projectName) {
            $listItems .= "<li>{$projectName}</li>";
        }

        return (new MailMessage)
            ->subject(count($this->projectNames) . ' Projects Moved to Trash')
            ->greeting('Hello,')
            ->line('We regret to inform you that the following projects have been moved to the trash:')
            ->line(new HtmlString('<ul>' . $listItems . '</ul>'))
            ->line('Your projects in the trash will be permanently deleted in 30 days, so please restore them if needed.')
            ->action('View Trashed Projects', url('/projects/trashed'))
            ->line('You can visit the link above to view and possibly restore your projects.')
            ->line('Thank you for using our application! If you have any questions or need assistance, please contact our support team.');
    }

    /**
     * Determine which queues should be used for each notification channel.
     *
     * @return array<string, string>
     */
    public function viaQueues(): array
    {
        return [
            'mail' => 'mail-queue',
        ];
    }
}
