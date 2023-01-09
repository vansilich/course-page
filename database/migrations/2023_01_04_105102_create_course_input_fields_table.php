<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseInputFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_input_fields', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('user_data_fields');

            $table->text('validation_rule')->comment('Правило валидации Laravel');

            $table->unique(['course_id', 'field_id']);

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
        Schema::dropIfExists('course_input_fields');
    }
}
