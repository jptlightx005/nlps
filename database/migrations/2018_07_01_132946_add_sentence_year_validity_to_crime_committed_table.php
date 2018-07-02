<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSentenceYearValidityToCrimeCommittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crime_committed', function (Blueprint $table) {
            $table->string('sentence')->nullable();
            $table->integer('sentence_years')->nullable();
            $table->date('sentence_validity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crime_committed', function (Blueprint $table) {
            $table->dropColumn('sentence');
            $table->dropColumn('sentence_years');
            $table->dropColumn('sentence_validity');
        });
    }
}
