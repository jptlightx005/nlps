<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToBlotterReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blotter_reports', function (Blueprint $table) {
            $table->text("reentry_number");
            $table->text("type_of_incident");
            $table->text("copy_for");
            $table->datetime("date_of_incident");
            $table->text("place_of_incident");
            $table->text("incident_narattive"); //loooong

            $table->integer("victim_id");
            $table->integer("officer_id");
            $table->integer("desk_officer_id");
            $table->text("blotter_entry_no");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blotter_reports', function (Blueprint $table) {
            $table->dropColumn("reentry_number");
            $table->dropColumn("type_of_incident");
            $table->dropColumn("copy_for");
            $table->dropColumn("date_of_incident");
            $table->dropColumn("place_of_incident");
            $table->dropColumn("incident_narattive"); //loooong

            $table->dropColumn("victim_id");
            $table->dropColumn("officer_id");
            $table->dropColumn("desk_officer_id");
            $table->dropColumn("blotter_entry_no");
        });
    }
}
