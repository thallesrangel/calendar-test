<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            [
                'name' => 'Thalles',
                'cpf' => '89289676000',
                'role' => 'admin',
                'email' => 'thalles@gmail.com',
                'password' => '202cb962ac59075b964b07152d234b70',
            ],
            [
                'name' => 'Micaelly',
                'cpf' => '17500307055',
                'role' => 'student',
                'email' => 'micaelly@gmail.com',
                'password' => '202cb962ac59075b964b07152d234b70',
            ],
            [
                'name' => 'Vicente',
                'cpf' => '95952807046',
                'role' => 'student',
                'email' => 'vicente@gmail.com',
                'password' => '202cb962ac59075b964b07152d234b70',
            ],
            [
                'name' => 'Jaqueline',
                'cpf' => '98749610074',
                'role' => 'student',
                'email' => 'jaqueline@gmail.com',
                'password' => '202cb962ac59075b964b07152d234b70',
            ],
        ]);
    }
}
