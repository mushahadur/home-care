<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class NewUserVerifiedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        // dd($this->user);
        return (new MailMessage)
                    ->subject('নতুন ইউজার ভেরিফিকেশন')
                    ->line('নতুন ইউজার ভেরিফাই করেছে!')
                    ->line('নাম: ' . $this->user->name)
                    ->line('ইমেইল: ' . $this->user->email)
                    ->action('ইউজার দেখুন', route('admin.users.index', $this->user->id));
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'নতুন ইউজার ভেরিফাই করেছে: ' . $this->user->name,
            'user_id' => $this->user->id,
            'url' => route('admin.users.index', $this->user->id),
        ];
    }
}
