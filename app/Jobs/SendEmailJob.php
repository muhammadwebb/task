<?php

namespace App\Jobs;

use App\Mail\SendApplication;
use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Application $application;
    public function __construct(Application $application)
    {
        $this->application = $application;
    }


    public function handle(): void
    {
        Mail::to('alimukhammad7699@gmail.com')
            ->send(new SendApplication([
                'id' => $this->application->id,
                'name' => $this->application->user->name,
                'subject' => $this->application->subject,
                'message' => $this->application->message,
                'file' => $this->application->file_url
            ]));
    }
}
