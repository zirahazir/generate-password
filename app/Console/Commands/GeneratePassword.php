<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GeneratePassword extends Command
{
    protected $signature = 'generate:password {--lowercase} {--uppercase} {--numbers} {--symbols} {--length=}';

    public function handle()
    {
        $lowercase = $this->option('lowercase');
        $uppercase = $this->option('uppercase');
        $numbers = $this->option('numbers');
        $symbols = $this->option('symbols');
        $length = $this->option('length') ?: 8;

        $characters = '';

        if ($lowercase) {
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($uppercase) {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($numbers) {
            $characters .= '0123456789';
        }
        if ($symbols) {
            $characters .= '!#$%&()*+@^';
        }

        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        $this->info("Password: $password");

        // Command:
        // php artisan generate:password --lowercase --uppercase --numbers --symbols --length=12

    }
}
