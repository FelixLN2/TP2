<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Genus::create(
            [
                
                'nom' => 'john',
                'description' => 'john',
                'created_at'=> now(),
                'updated_at'=> now(),
                'user_id'=>  \App\Models\User::inRandomOrder()->first()->id,
               
            ]
            );

        \App\Models\Animal::create(
            [
                'nom' => 'john',
                'description' => 'john',
                'created_at'=> now(),
                'updated_at'=> now(),
                'genus_id'=>\App\Models\Genus::inRandomOrder()->first()->id,
                'user_id'=> \App\Models\User::inRandomOrder()->first()->id,
            ]
            );
    }
}
