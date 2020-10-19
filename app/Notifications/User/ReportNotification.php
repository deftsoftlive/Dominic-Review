<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReportNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //dd($notifiable);

        $parent = \DB::table('users')->where('parent_id',$notifiable->parent_id)->first(); 
        $coach_name = getUsername($notifiable->coach_id);
        $child_name = getUsername($notifiable->player_id);

        if($notifiable->type == 'complex')
        {
            $type = 'Player report';
        }
        else if($notifiable->type == 'simple')
        {
            $type = 'End of term report';
        }

        return [
            'send_to' => $notifiable->player_id,
            'data' => $coach_name.' has uploads a new report for player - '.$child_name
        ];
    }
}
