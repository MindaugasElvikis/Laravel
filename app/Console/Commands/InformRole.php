<?php

namespace App\Console\Commands;

use App\Role;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InformRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inform:roles';

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
     * @return mixed
     */
    public function handle()
    {
        $roles = array_column(Role::get(['name'])->toArray(), 'name');
        $roleName = $this->choice('Which role do you choose?', $roles);

        $users = User::whereHas('role', function ($query) use ($roleName) {
            $query->where('name', $roleName);
        })->with('role')->with('posts')->get();

        dd($users);

    }
}
