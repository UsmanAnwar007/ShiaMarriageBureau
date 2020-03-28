<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make("admin123"),
            'phonenumber'=>'3124564321',
            'country'=>'Pakistan',
            'country_code'=>'92',
            'type'=>"admin"
        ]);
    }
}
