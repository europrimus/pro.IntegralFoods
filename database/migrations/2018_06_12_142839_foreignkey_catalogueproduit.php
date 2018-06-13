<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignkeyCatalogueproduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogueproduit', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('utilisateur');
            $table->foreign('produit_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogueproduit', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('utilisateur');
            $table->foreign('produit_id')->references('id')->on('articles');
        });
    }
}
