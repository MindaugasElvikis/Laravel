<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Symfony\Component\HttpFoundation\Request;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Musu nauja testine komanda';

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
        $users = User::all();

        $bar = $this->output->createProgressBar();

        for ($i = 1; $i< 500000; $i++) {
            $bar->advance(1000);
        }

        $bar->finish();
    }

    private function askName($name = null)
    {
        if (!empty($name)) {
            return $name;
        }

        return $this->output->ask('What is your name?', null, function ($value) {
            return $this->askName($value);
        });
    }
}
