<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

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
        $name = $this->ask('Votre nom : ', 'admin');
        $email = $this->ask('Votre adresse électronique : ', 'admin@admin.com');
        $password = $this->ask('Votre mot de passe : ', 'secret');

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password= bcrypt($password);

        $user->save();
    }
}
