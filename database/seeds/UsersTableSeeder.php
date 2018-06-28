<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Jason',
        	'email' => 'jekinneys@yahoo.com',
        	'password' => 'aubreys1',
        ]);

        factory( User::class, 20 )->create();
    }
}
