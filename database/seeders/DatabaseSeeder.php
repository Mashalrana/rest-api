<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Call the ArticlesTableSeeder
        $this->call(ArticlesTableSeeder::class);

        // Call the UsersTableSeeder
        $this->call(UsersTableSeeder::class);

        // And other seeders if you have
    }
}
