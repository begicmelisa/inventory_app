<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
           'name'=>'name Test',
           'address'=>'Test Addres 23 0 3 ',
           'contact_number' =>'12345696607',
           'contact_email'=>'testemail.@test.com'
        ]);
    }
}
