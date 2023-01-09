<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('Название курса');
            $table->string('slug')->comment('title курса для URL')->unique();
            $table->string('link')->nullable()->comment('Ссылка на курс (teachbase)');

            $table->dateTime('start_date')->comment('Дата начала регистрации на курс');
            $table->dateTime('end_date')->comment('Дата конца регистрации на курс');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
