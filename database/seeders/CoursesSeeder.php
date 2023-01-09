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
            'title' => 'Компас 3Д | Моделирование клапана',
            'slug' => 'valve-modeling',
            'start_date' => now(),
            'end_date' => now()->addDays(10),
        ]);
    }
}
