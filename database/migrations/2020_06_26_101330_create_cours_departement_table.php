<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours_departement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('cour_id')->unsigned();
            $table->BigInteger('departement_id')->unsigned();
            $table->BigInteger('fillere_id')->unsigned();
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
        Schema::dropIfExists('post_departement');
    }
}
