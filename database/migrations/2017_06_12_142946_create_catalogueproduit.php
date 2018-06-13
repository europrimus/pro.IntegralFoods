<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogueproduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogueproduit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->float('prix');
            $table->string('conditionnement');
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
        //
    }
}
