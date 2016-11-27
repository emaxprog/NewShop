<?php

namespace App\Listeners;

use App\Events\OrderIsConfirmed;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class OrderIsConfirmedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderIsConfirmed $event
     * @return void
     */
    public function handle(OrderIsConfirmed $event)
    {
        $admin = User::where('is_admin', '1')->first();
        $user = $event->getUser();
        $data = [
            'user' => $user,
        ];
        Mail::send('mail.order', $data, function ($m) use ($user, $admin) {
            $m->from($user->email);
            $m->to($admin->email, $admin->name);
        });
    }
}
