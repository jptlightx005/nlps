<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_clearances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('control_number');
            $table->date('date_issued')->nullable();
            $table->string('place_issued');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable(); //age
            $table->string('contact_number')->default('');
            $table->string('address')->default('');
            $table->string('place_of_birth')->default('');
            $table->string('nationality');
            $table->string('purpose');
            $table->string('gender');
            $table->string('civil_status')->default('');
            $table->binary('picture')->nullable();
            $table->date('expiration_date')->nullable();
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
        Schema::dropIfExists('police_clearances');
    }
}
