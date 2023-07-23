<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('admin123'),
            'role'=>'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'tpl',
            'email' => 'tpl@gmail.com',
            'password'=>bcrypt('tpl123'),
            'role'=>'tpl'
        ]);
    }
}
