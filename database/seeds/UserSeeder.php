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
           'name' => 'J&P Perifericos S.A.C',
           'ruc' => '20545122520',
           'password' => bcrypt('1'),
           'url' => '/jypsac',
           'estado' => 1,
           'tipo' => 'Administrador'
       ]);
    }
}
