<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditableOfficerFieldsInPoliceClearanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('police_clearances', function (Blueprint $table) {
            $table->string('officer1')->nullable();
            $table->string('officer1rank')->nullable();
            $table->string('officer1role')->nullable();

            $table->string('officer2')->nullable();
            $table->string('officer2rank')->nullable();
            $table->string('officer2role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('police_clearances', function (Blueprint $table) {
            //
        });
    }
}
