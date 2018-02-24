<?php

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
        App\User::create([

        	'name' => 'admin',
        	'password' => bcrypt('password'),
        	'email' => 'angheluta.lupu@gmail.com',
        	'admin' => 1,
        	'avatar'=> asset('avatars/gravatar.png')
        ]);

        App\User::create([


            'name' => 'John Doe',
            'password' => bcrypt('password'),
            'email' => 'john@doe.com',
            'avatar' => 'avatars/sloth.jpg'
        ]);
    }

}

