<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Services\SendWelcomeEmailService;
class SendUserWelcomeEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $service;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->service = new SendWelcomeEmailService($user);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $this->service->call();
    }
}
