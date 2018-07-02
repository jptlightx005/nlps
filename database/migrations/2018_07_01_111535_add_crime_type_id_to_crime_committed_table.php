<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCrimeTypeIdToCrimeCommittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crime_committed', function (Blueprint $table) {
            $table->integer('crime_type_id')->nullalbe()->after('crime_type');
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
            $table->dropColumn('crime_type_id');
        });
    }
}
