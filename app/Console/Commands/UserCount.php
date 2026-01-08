<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use Illuminate\Console\Command;

class UserCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Count';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app(UserController::class)->userCount();
        info("user Count");
    }
}
