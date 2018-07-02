<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeverityToCrimeCommittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crime_committed', function (Blueprint $table) {
            $table->string('severity')->nullable()->default('MINOR')->after('investigator');
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
            $table->dropColumn('severity');
        });
    }
}
