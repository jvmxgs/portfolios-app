<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectRestoredNotification extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->subject(count($this->projectNames) . ' Projects Restored from Trash')
            ->greeting('Hello,')
            ->line('The following projects have been restored from the trash:')
            ->line(implode(', ', $this->projectNames))
            ->action('View Restored Projects', url('/projects'))
            ->line('You can visit the link above to view your projects.')
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
