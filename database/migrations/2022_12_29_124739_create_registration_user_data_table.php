<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_user_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('registraion_id');
            $table->foreign('registraion_id')->references('id')->on('course_registrations');

            $table->string('field_name');
            $table->text('field_value');

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
        Schema::dropIfExists('registration_user_data');
    }
}
