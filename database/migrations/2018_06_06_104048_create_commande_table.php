<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero de commande')->unique;
            $table->integer('adresse de livraison');
            // $table->foreign('adresse de facturation')->references('id')->on('adresse');
            $table->integer('adresse de facturation');
            // $table->foreign('adresse de livraison')->references('id')->on('adresse');
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
        Schema::dropIfExists('commande');
    }
}
