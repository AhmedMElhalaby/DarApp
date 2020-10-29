<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyAccount extends Notification
{
    use Queueable;
    protected $token;
    protected $code;

    /**
     * Create a new notification instance.
     *
     * @param $token
     * @param $code
     */
    public function __construct($token,$code)
    {
        $this->token = $token;
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('You are receiving this email because you registered with us .')
            ->line('Verify Code : '.$this->code)
            ->line('Or press here')
            ->action('Verify Email',url('user/verify?token='.$this->token))
            ->line('If you did not register, no further action is required.');
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
            //
        ];
    }
}
