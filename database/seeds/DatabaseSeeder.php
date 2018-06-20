<?php

use Illuminate\Database\Seeder;
//use database\seeds\donneesFictives;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('utilisateur')->insert([
        'civilite'=> 'Monsieur',  //['Monsieur','Madame']);
        'nom' => 'Integral',
        'prenom' => 'Food',
        'entreprise' => 'Integral Food',
        'etablissement'=> 'autre', //['distributeur','restaurant indépendant','chaîne de restaurants','épicerie','collectivité','traiteur','industrie','autre']
        'tel' => '0972626718',
        'email' => 'contact@integralfoods.fr',
        'siret' => '799852934',
        'kbis' => '',
        'login' => 'admin',
        'password' => password_hash( "secret" , PASSWORD_DEFAULT ),
        'commentaire' => 'Administateur',
        'role' => 'administrateur',
      ]);
      $this->call([donneesFictives::class]);
    }
}
