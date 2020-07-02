<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Starters',
                'image' => 'mushrooms.jpg',
                'display_order' => 1
            ],
            [
                'name' => 'Salads',
                'image' => 'salad.jpg',
                'display_order' => 2
            ],
            [
                'name' => 'Entrees',
                'image' => 'burger.jpg',
                'display_order' => 3
            ],
            [
                'name' => 'Desert',
                'image' => 'brownie.jpg',
                'display_order' => 4
            ],
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => '2020-02-20',
            'password' => bcrypt('admin'),
            'is_admin' => 1
        ]);
    }
}
