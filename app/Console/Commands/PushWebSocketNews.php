<?php

namespace App\Console\Commands;

use App\Events\MessageCreateBroadcastEvent;
use App\Message;
use Illuminate\Console\Command;

/**
 * Class PushWebSocketNews.
 */
class PushWebSocketNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:news {text}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
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
     * @return void
     */
    public function handle()
    {
        $message = Message::create(['text' => $this->argument('text'),]);
        event(new MessageCreateBroadcastEvent($message));
    }
}
