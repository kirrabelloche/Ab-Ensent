<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepartementIdToCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cours', function (Blueprint $table) {
            $table->unsignedInteger('departement_id')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cours', function (Blueprint $table) {
            $table->dropColumn('departement_id');
        });
    }
}
