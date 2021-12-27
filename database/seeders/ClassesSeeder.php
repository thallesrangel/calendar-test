<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'people_id' => 1,
                'date_time_start' => '2021-12-27 21:00:00',
                'date_time_end' => '2021-12-27 21:50:00',
                'name_class' => 'Introdução',
                'name_teacher' => 'Roberto',
                'limit_student' => 3,
                'flag_status' => 'enabled'
            ],
            [
                'people_id' => 1,
                'date_time_start' => '2021-12-27 22:00:00',
                'date_time_end' => '2021-12-27 22:50:00',
                'name_class' => 'Prática',
                'name_teacher' => 'Carlos',
                'limit_student' => 2,
                'flag_status' => 'enabled'
            ],
            [
                'people_id' => 1,
                'date_time_start' => '2021-12-27 23:00:00',
                'date_time_end' => '2021-12-27 23:50:00',
                'name_class' => 'Avaliativa',
                'name_teacher' => 'Gilberto',
                'limit_student' => 2,
                'flag_status' => 'enabled'
            ],
        ]);
    }
}
