<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'zonieed hossain',
            'email' => 'zonieed@demo.com',
            'password' => Hash::make('1234'),
            'role' => 'admin'
        ]);
    }
}
