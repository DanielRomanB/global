<?php

use Illuminate\Database\Seeder;

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
           'id' => 1 ,
           'email' => 'desarrollo@jypsac.com',
           'password' => bcrypt('123'),
           'estado' => 1
       ]);
    }
}
