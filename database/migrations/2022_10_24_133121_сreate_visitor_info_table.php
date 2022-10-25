<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class СreateVisitorInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_info', function (Blueprint $table) {
            $table->id();
            $table->string('email_hash');
            $table->string('utm_subject')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('type')->nullable();
            $table->string('ip')->nullable();
            $table->string('from')->nullable();
            $table->string('ym_uid')->nullable();
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
        Schema::dropIfExists('visitor_info');
    }
}
