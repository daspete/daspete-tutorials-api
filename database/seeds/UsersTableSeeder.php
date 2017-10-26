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
        //
        DB::table('users')->insert([
            'name' => 'APIC User',
            'email' => 'user@api.dev',
            'password' => bcrypt('123456'),
        ]);
    }
}
