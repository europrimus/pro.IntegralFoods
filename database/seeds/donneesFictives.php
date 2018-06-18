<?php

use Illuminate\Database\Seeder;

class donneesFictives extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// utilisateurs
      DB::table('utilisateur')->insert([
        'civilite'=> 'Monsieur',  //['Monsieur','Madame']);
        'nom' => 'Integral',
        'prenom' => 'Food',
        'entreprise' => 'Integral Food',
        'etablissement'=> 'autre', //['distributeur','restaurant indépendant','chaîne de restaurants','épicerie','collectivité','traiteur','industrie','autre']
        'tel' => str_pad(mt_rand(), 10, "0", STR_PAD_LEFT),
        'email' => str_random(5).'@gmail.com',
        'siret' => str_random(16),
        'kbis' => '',
        'login' => 'admin',
        'password' => bcrypt('secret'),
        'commentaire' => 'Administateur',
        'role' => 'administrateur',
      ]);
      DB::table('utilisateur')->insert([
        'civilite'=> 'Madame',  //['Monsieur','Madame']);
        'nom' => 'Miam',
        'prenom' => 'Josiane',
        'entreprise' => 'La bonne auberge',
        'etablissement'=> 'restaurant indépendant', //['distributeur','restaurant indépendant','chaîne de restaurants','épicerie','collectivité','traiteur','industrie','autre']
        'tel' => str_pad(mt_rand(), 10, "0", STR_PAD_LEFT),
        'email' => str_random(5).'@gmail.com',
        'siret' => str_random(16),
        'kbis' => '',
        'login' => 'MiamJo',
        'password' => bcrypt('secret'),
        'commentaire' => 'Notre premier client !',
        'role' => 'client', //['administrateur','inscription en attente','client']
      ]);
      DB::table('utilisateur')->insert([
        'civilite'=> 'Madame',  //['Monsieur','Madame']);
        'nom' => str_random(10),
        'prenom' => str_random(6),
        'entreprise' => str_random(15),
        'etablissement'=> 'distributeur', //['distributeur','restaurant indépendant','chaîne de restaurants','épicerie','collectivité','traiteur','industrie','autre']
        'tel' => str_pad(mt_rand(), 10, "0", STR_PAD_LEFT),
        'email' => str_random(5).'@gmail.com',
        'siret' => str_random(16),
        'kbis' => '',
        'login' => str_random(6),
        'password' => bcrypt(str_random(6)),
        'commentaire' => str_random(30),
        'role' => 'client', //['administrateur','inscription en attente','client']
      ]);

// Adresses
      DB::table('adresse')->insert([
        'users_id'=> 2,
        'adresse' => '2 rue de la Fourchette',
        'codePostal' => "21000",
        'ville' => "Dijon",
        'type'=> 'facturation', //['livraison','facturation','contact'])
      ]);
      DB::table('adresse')->insert([
        'users_id'=> 2,
        'adresse' => '15 rue du Couteau',
        'codePostal' => "21000",
        'ville' => "Dijon",
        'type'=> 'livraison', //['livraison','facturation','contact'])
      ]);
      DB::table('adresse')->insert([
        'users_id'=> 2,
        'adresse' => '2 rue de la Fourchette',
        'codePostal' => "21000",
        'ville' => "Dijon",
        'type'=> 'livraison', //['livraison','facturation','contact'])
      ]);

// Produits
      DB::table('articles')->insert([
        'titre'=> 'Sauce de la Brigade',
        'description'=>'Nous avons élaboré La Sauce de la Brigade à base d’ingrédients naturels soigneusement sélectionnés. Ce mélange concentré permet de préparer facilement une sauce gourmande qui ravira jusqu’à 400 convives par boîte.
Ingrédients: Lait entier en poudre, Paprika AOP (doux 16% et piquant 8%), Sel, Fromage Cheddar en poudre, Ail, Huile de Paprika pressée à froid, Oignons frits, Safran
Recette pour une sauce crémeuse: Diluer 20 à 30 grammes de Sauce de la Brigade dans 1 L de crème liquide, Porter le mélange à ébullition, Remuer jusqu’à obtention de la texture souhaitée
Suggestion d’utilisation: Sauce, beurre composé, panure et assaisonnement',
        'reference'=>'SauceBrigade500g',
        'ean'=>str_pad(mt_rand(), 13, "0", STR_PAD_LEFT),
      ]);
      DB::table('articles')->insert([
        'titre'=> 'Paprika doux AOP',
        'description'=>'Le paprika AOP a été cultivé, récolté et transformé dans la région de Szeged en Hongrie. Riche d’un savoir-faire et de tradition accumulés depuis le XVIIème s, cette région singulière confère au paprika sa qualité d’exception. Récolté à pleine maturation à l’automne 2017, vous apprécierez son goût frais et aromatique ainsi que sa puissante couleur rouge (ASTA 160). Il se décline en version piquant ou doux.
Le Paprika délicieusement Fumé de manière artisanale possède des arômes puissants et enivrants ainsi qu’une intense couleur rouge (ASTA 140).
Ingrédients: 100 % paprika (Variantes: Piquant ou Doux)
Utilisation: Assaisonnements pour viande et poissons, sauce, saupoudrage…',
        'reference'=>'PaprikaDouxAOP250g',
        'ean'=>str_pad(mt_rand(), 13, "0", STR_PAD_LEFT),
      ]);
      DB::table('articles')->insert([
        'titre'=> 'Paprika piquant AOP',
        'description'=>'Le paprika AOP a été cultivé, récolté et transformé dans la région de Szeged en Hongrie. Riche d’un savoir-faire et de tradition accumulés depuis le XVIIème s, cette région singulière confère au paprika sa qualité d’exception. Récolté à pleine maturation à l’automne 2017, vous apprécierez son goût frais et aromatique ainsi que sa puissante couleur rouge (ASTA 160). Il se décline en version piquant ou doux.
Le Paprika délicieusement Fumé de manière artisanale possède des arômes puissants et enivrants ainsi qu’une intense couleur rouge (ASTA 140).
Ingrédients: 100 % paprika (Variantes: Piquant ou Doux)
Utilisation: Assaisonnements pour viande et poissons, sauce, saupoudrage…',
        'reference'=>'PaprikaPiquantAOP250g',
        'ean'=>str_pad(mt_rand(), 13, "0", STR_PAD_LEFT),
      ]);
      DB::table('articles')->insert([
        'titre'=> 'Huile de Paprika doux',
        'description'=>'L’huile de paprika est faite à partir des graines de paprika pressées à froid. Elle est riche en vitamine E.
Ingrédients: 100 % huile de paprika (variantes: Piquant ou Doux)
Conseils d’utilisation: Elle peut être utilisée pour la cuisson, la friture ou l’assaisonnement de soupe, pizzas, sauces, marinades…',
        'reference'=>'HuilePaprikaDoux100ml',
        'ean'=>str_pad(mt_rand(), 13, "0", STR_PAD_LEFT),
      ]);

// Catalogue
      DB::table('catalogueproduit')->insert([
        'produit_id'=> 1,
        'users_id'=> 2,
        'prix'=> round( mt_rand(1,5000)/100,2 ),
      ]);
      DB::table('catalogueproduit')->insert([
        'produit_id'=> 2,
        'users_id'=> 2,
        'prix'=> round( mt_rand(1,5000)/100,2 ),
      ]);
      DB::table('catalogueproduit')->insert([
        'produit_id'=> 3,
        'users_id'=> 2,
        'prix'=> round( mt_rand(1,5000)/100,2 ),
      ]);
      DB::table('catalogueproduit')->insert([
        'produit_id'=> 3,
        'users_id'=> 3,
        'prix'=> round( mt_rand(1,5000)/100,2 ),
      ]);
      DB::table('catalogueproduit')->insert([
        'produit_id'=> 1,
        'users_id'=> 3,
        'prix'=> round( mt_rand(1,5000)/100,2 ),
      ]);
    }
}
