<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrimeCommittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crime_committed', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location_area_id');
            $table->string('crime_type');
            $table->text('description')->nullable();
            $table->string('officer_in_charge')->default('');
            $table->string('investigator')->default('');
            $table->dateTime('date_occured')->nullable();
            $table->dateTime('convicted_date')->nullable();
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
        Schema::dropIfExists('crime_committed');
    }
}
