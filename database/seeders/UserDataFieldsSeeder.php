<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserDataField;

class UserDataFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDataField::create(['title' => 'Имя и фамилия', 'slug' => 'name_and_surname', 'type' => 'string']);
        UserDataField::create(['title' => 'E-mail', 'slug' => 'email', 'type' => 'string']);
        UserDataField::create(['title' => 'Телефон', 'slug' => 'phone', 'type' => 'int']);
        
        UserDataField::create(['title' => 'Компания', 'slug' => 'company', 'type' => 'string']);
        UserDataField::create(['title' => 'Должность', 'slug' => 'job', 'type' => 'string']);

        UserDataField::create(['title' => 'Учебное заведение', 'slug' => 'educational-institution', 'type' => 'string']);
        UserDataField::create(['title' => 'Специализация', 'slug' => 'specialization', 'type' => 'string']);
        UserDataField::create(['title' => 'Студент', 'slug' => 'is-student', 'type' => 'bool']);
    }
}
