<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToSuspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suspects', function (Blueprint $table) {
            $table->string('citizenship');
            $table->string('gender');
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
            $table->string('work_address')->default('');
            $table->string('relation_to_victim')->default('');
            $table->string('email')->default('');

            $table->string('as_afppnp_rank')->default('');
            $table->string('unit_assgn')->default('');
            $table->string('affilation')->default('');

            $table->string('previous_criminal_record')->default('');
            $table->string('status_of_previous_case')->default('');

            $table->string('height')->default('');
            $table->string('weight')->default('');
            $table->string('built')->default('');
            $table->string('eye_color')->default('');
            $table->string('eye_description')->default('');
            $table->string('hair_color')->default('');
            $table->string('hair_description')->default('');
            $table->string('under_influenece_of')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suspects', function (Blueprint $table) {
            //
        });
    }
}
