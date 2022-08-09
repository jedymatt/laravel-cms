<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');
        $passwordConfirmation = $this->secret('Confirm your password');

        $this->validate([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $passwordConfirmation,
        ]);

        $user = \App\Models\User::create([
            'name' => $name,
            'email' => $email,
            'password' => \Hash::make($password),
        ]);

        $this->info("User \"{$user->name}\" created successfully.");

        return 0;
    }

    public function validate(array $credentials)
    {
        $validator = \Validator::make($credentials, [
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            $this->info('Could not create user. See the error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            throw new \Exception;
        }
    }
}
