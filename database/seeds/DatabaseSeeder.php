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
      $this->call([donneesFictives::class]);
    }
}
