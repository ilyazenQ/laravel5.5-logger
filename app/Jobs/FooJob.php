<?php

namespace App\Jobs;

use App\Foo;
use App\Helpers\LogToChannels;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FooJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $message;
    protected $title;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $title)
    {
        $this->message = $message;
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new LogToChannels())->info('Job', $this->message);
        Foo::create(['title'=>$this->title]);
    }
}
