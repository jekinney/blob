<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perm = Permission::create([
        	'slug' => 'author',
        	'name' => 'Author',
        	'description' => 'Create and edit articles',
        ]);

        $perm->users()->attach( App\User::where('email', 'jekinneys@yahoo.com')->first()->id );
    }
}
