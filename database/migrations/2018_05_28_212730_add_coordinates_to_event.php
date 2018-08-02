<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordinatesToEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('events', function($table){
            $table->double('lat',20,10)->nullable();
            $table->double('lng',20,10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('events', function($table){
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}
