<?php

namespace App\Console\Commands\Notifications;

use App\Events\Notifications\CreateNotification;
use Illuminate\Console\Command;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:send {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications for users';

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
     * @return array
     */
    public function handle(): array
    {
        $message = $this->argument('message');

        return event(new CreateNotification($message));
    }
}
