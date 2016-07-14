<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends \Styde\Seeder\BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $truncate=array(
        'cars',
        'features',
        'users'
    );
    protected $seeders=array(
        'User',
        'Features',
        'Car'
    );
   
}
