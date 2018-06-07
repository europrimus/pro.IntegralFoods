<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adresse', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('utilisateur');
        });

        Schema::table('voir', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('utilisateur');
            $table->foreign('produit_id')->references('id')->on('produit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('migration');
    }
}
