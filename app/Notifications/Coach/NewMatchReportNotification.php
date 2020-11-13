<?php

namespace App\Notifications\Coach;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMatchReportNotification extends Notification
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
        $player = \DB::table('users')->where('id',$notifiable->player_id)->first();
        $coach_id = isset($notifiable->coach_id) ? $notifiable->coach_id: '';

        $linked_coach = \DB::table('parent_coach_reqs')->where('parent_id',$notifiable->parent_id)->where('child_id',$notifiable->player_id)->first();

        if(!empty($coach_id))
        {
            return [
                'send_to' => $coach_id,
                'data' => 'Linked Player - '.$player->name.' - has uploaded new match'
            ];
        }
        else
        {
            return [
                'send_to' => $linked_coach->coach_id,
                'data' => 'Linked Player - '.$player->name.' - has uploaded new match'
            ];
        }
    }
}
