<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complainants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type'); //victim or reporter or both
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('qualifier')->default('');
            $table->string('nickname');
            $table->string('citizenship');
            $table->string('gender');
            $table->string('civil_status')->default('');
            $table->date('date_of_birth')->nullable(); //age
            $table->string('place_of_birth')->default('');
            $table->string('home_phone')->default('');
            $table->string('mobile_phone')->default('');

            $table->string('current_address')->default('');
            $table->string('current_village')->default('');
            $table->string('current_barangay')->default('');
            $table->string('current_town')->default('');
            $table->string('current_province')->default('');

            $table->string('other_address')->default('');
            $table->string('other_village')->default('');
            $table->string('other_barangay')->default('');
            $table->string('other_town')->default('');
            $table->string('other_province')->default('');

            $table->string('highest_educational_attainment')->default('');
            $table->string('occupation')->default('');
            $table->string('id_presented')->default('');
            $table->string('email')->default('');
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
        Schema::dropIfExists('complainants');
    }
}
