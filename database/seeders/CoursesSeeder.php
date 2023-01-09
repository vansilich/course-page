<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'title' => 'Компас 3Д | Для начинающих',
            'slug' => 'for-beginners',
            'start_date' => '2022-10-31 00:00:00',
            'end_date' => '2022-11-24 00:00:00',
        ]);

        Course::create([
            'title' => 'Компас 3Д | Моделирование клапана',
            'slug' => 'valve-modeling',
            'start_date' => '2023-01-09 00:00:00',
            'end_date' => '2023-01-23 00:00:00',
        ]);
    }
}
