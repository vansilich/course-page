<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFutureRegistrationUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_future_registration_user_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')->references('id')->on('course_future_registrations');

            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('user_data_fields');

            $table->text('field_value')->nullable();

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
        Schema::dropIfExists('course_future_registration_user_data');
    }
}
