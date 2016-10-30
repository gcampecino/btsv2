<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
           'name' => 'John Snow',
           'email' => 'jsnow@gmail.com',
           'password' => bcrypt('test123'),
           'is_admin' => true,
       ]);
       DB::table('users')->insert([
          'name' => 'Ned Stark',
          'email' => 'nstark@gmail.com',
          'password' => bcrypt('test123'),
          'is_admin' => false,
      ]);
    }
}
