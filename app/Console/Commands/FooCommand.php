<?php

namespace App\Console\Commands;

use App\Foo;
use App\Helpers\LogToChannels;
use Illuminate\Console\Command;

class FooCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foo:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete foo by id';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');
        (new LogToChannels())->notice('Command', $this->description . $id . " command started");

        try {
            Foo::findOrFail($id)->delete();
            $this->comment("Foo with id:{$id} deleted.");
            (new LogToChannels())->notice('Command', $this->description . $id . " command done");
        } catch (\Exception $e) {
            $this->error($e);
            (new LogToChannels())->error('Command', $this->description . $id. " command done with error");
        }

    }
}
