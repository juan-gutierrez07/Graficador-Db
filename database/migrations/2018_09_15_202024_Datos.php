<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Datos extends Migration
{
    
    public function up()
    {
        Schema::create('Datos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Total_Db');
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
        
    }
}
