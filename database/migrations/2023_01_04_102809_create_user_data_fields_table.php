<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data_fields', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('Человекочитаемое имя поля');
            $table->string('slug')->comment('Имя input`a');
            $table->text('type')->comment('PHP тип данных инпута');

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
        Schema::dropIfExists('user_data_fields');
    }
}
