<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Decibeles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
     Schema:: create('Decibles',function(Blueprint $table ){
          $table-> increments('IdDecibeles');
          $table-> string('Columna',10); 
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
    }
}
