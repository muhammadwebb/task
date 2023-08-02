<?php

namespace App\Jobs;

use App\Mail\SendAnswer;
use App\Models\Answer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendAnswerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Answer $answer;
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }


    public function handle(): void
    {
        Mail::to('dlord4077@gmail.com')
            ->send(new SendAnswer([
                'message' => $this->answer->body
            ]));
    }
}
