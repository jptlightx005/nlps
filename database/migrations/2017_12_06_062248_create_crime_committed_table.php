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
            $table->integer('user_id');
            $table->string('location_area_id');
            $table->string('crime_type');
            $table->text('description')->nullable();
            $table->dateTime('date_occured');
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
