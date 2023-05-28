<?php

namespace App\Jobs;

use App\Mail\SendMail;
use App\Models\Subscriber;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class emailSendJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {

        $this->details = $details;

    }


    /**
     * Execute the job.
     *
     * @return void
     */


    public function handle()
    {
        try {
            $subscribers = Subscriber::all()->pluck('email');
            $email = new SendMail($this->details);            
            Mail::to($subscribers)->send($email);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
