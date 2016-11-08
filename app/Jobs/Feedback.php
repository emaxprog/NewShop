<?php

namespace App\Jobs;

use App\Http\Requests\Request;
use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Feedback extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $admin = User::where('is_admin', 1)->first();
        $data = $this->data;
        $mailer->send('mail.order', $data, function ($m) use ($data, $admin) {
            $m->from($data['email'], $data['message']);
            $m->to($admin->email);
        });
    }
}
