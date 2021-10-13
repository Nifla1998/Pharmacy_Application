<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
               [
                   "name"=>"Amali",
                   "email"=>"amali@gmail.com",
                   "password"=>Hash::make("amali123"),
                   "role_id"=>1
               ],
               [
                   "name"=>"Kamal",
                   "email"=>"kamal@gmail.com",
                   "password"=>Hash::make("kamal123"),
                   "role_id"=>2
               ],
               [
                   "name"=>"Aruni",
                   "email"=>"aruni@gmail.com",
                   "password"=>Hash::make("aruni123"),
                   "role_id"=>3
               ],
        ]);
    }
}
