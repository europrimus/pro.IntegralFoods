<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('civilite',['Monsieur','Madame']);
            $table->string('nom');
            $table->string('prenom');
            $table->string('entreprise')->unique();
            $table->enum('etablisement',['distributeurs','restaurant independant','chaine de restaurants','epicerie','collectivites','traiteur','industrie','autres']);
            $table->integer('tel');
            $table->string('email')->unique();
            $table->string('siret')->unique();
            $table->string('kbis');
            $table->string('login');
            $table->string('password');
            $table->text('commentaire');
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
        Schema::dropIfExists('utilisateur');
    }
}
