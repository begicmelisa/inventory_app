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
        $user = App\User::create([
           'name'=>'Melisa Begic',
           'email'=>'melisa.begic@edu.fit.ba',
           'password'=>bcrypt('password'),
            'admin'=>1
        ]);

        App\Profile::Create([
            'user_id'=> $user->id,
            'about'=>'  ',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'
        ]);
    }
}
