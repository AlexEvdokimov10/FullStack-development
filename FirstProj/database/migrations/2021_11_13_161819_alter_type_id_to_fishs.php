<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTypeIdToFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fishs', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->unsignedBigInteger('type_id')->nullable();

            $table->foreign('type_id')->references('id')->on('types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fishs', function (Blueprint $table) {
           $table->dropColumn('type_id');
           $table->string('type',5);
        });
    }
}
