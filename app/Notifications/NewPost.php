<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use App\Post;

class NewPost extends Notification
{
    use Queueable;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $post;

    public function __construct(Post $post)
    {
        //
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database','nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = new MailMessage();
                    $message->greeting('Hello'.$notifiable->name)
                    ->line('A new Post'.$this->post->title. 'has been created')
                    ->action('View Post', route('posts.view',[$this->post->id]))
                    ->line('Thank you for using our application!');
        return $message;
    }

    public function toDatabase($notifiable)
    {
        return [
            'icon' => '',
            'message' => 'A new post (' . $this->post->title . ') has been created.',
            'url' => route('posts.view', [$this->post->id]),
        ];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'icon' => '',
            'message' => 'A new post (' . $this->post->title . ') has been created.',
            'url' => route('posts.view', [$this->post->id]),
        ];
    }

    public function toNexmo($notifiable)
    {
        $message = new NexmoMessage();
        $message->content('A new post created!');

        return $message;
    }
}
