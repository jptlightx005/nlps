<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('qualifier')->default('');
            $table->string('alias');
            $table->date('date_of_birth')->nullable(); //age

            $table->string('civil_status')->default('');
            $table->string('occupation')->default('');
            $table->string('address')->default('');

            // $table->boolean('convicted')->default(false);
            //Mugshot image names
            $table->string('whole_body')->default('');
            $table->string('front')->default('');
            $table->string('left_face')->default('');
            $table->string('right_face')->default('');
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
        Schema::dropIfExists('suspects');
    }
}
