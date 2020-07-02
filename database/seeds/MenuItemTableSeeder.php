<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::select('select * from categories');
        $catIds = [];
        foreach ($categories as $cat) {
            $catIds[$cat->name] = $cat->id;
        }
        $startersId = $catIds['Starters'];
        $saladsId = $catIds['Salads'];
        $entreesId = $catIds['Entrees'];
        $dessertsId = $catIds['Desert'];

        DB::table('menu_items')->insert([

            // Starters

            [
                'name' => 'Mini Cheeseburgers',
                'category_id' => $startersId,
                'image' => 'mini_cheeseburgers.jpg',
                'description' => 'These mini cheeseburgers are served on a fresh baked pretzel bun with lettuce, tomato, avocado, and your choice of cheese.',
                'price' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'French Onion Soup',
                'category_id' => $startersId,
                'image' => 'french_onion_soup.jpg',
                'description' => 'Caramelized onions slow cooked in a savory broth, topped with sourdough and a provolone cheese blend. Served with sourdough bread.',
                'price' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Artichokes with Garlic Aioli',
                'category_id' => $startersId,
                'image' => 'artichokes_with_garlic_aioli.jpg',
                'description' => 'Our artichokes are brushed with an olive oil and rosemary blend and then broiled to perfection. Served with a side of creamy garlic aioli.',
                'price' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Parmesan Deviled Eggs',
                'category_id' => $startersId,
                'image' => 'parmesan_deviled_eggs.jpg',
                'description' => 'These delectable little bites are made with organic eggs, fresh Parmesan, and chopped pine nuts.',
                'price' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Salads
            [
                'name' => 'Garden Buffet',
                'category_id' => $saladsId,
                'image' => 'parmesan_deviled_eggs.jpg',
                'description' => 'Choose from our fresh local, organically grown ingredients to make a custom salad.',
                'price' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'House Salad',
                'category_id' => $saladsId,
                'image' => 'house_salad.jpg',
                'description' => 'Our house salad is made with romaine lettuce and spinach, topped with tomatoes, cucumbers, red onions and carrots. Served with a dressing of your choice.',
                'price' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Chef's Salad",
                'category_id' => $saladsId,
                'image' => 'chefs_salad.jpg',
                'description' => 'The chef’s salad has cucumber, tomatoes, red onions, mushrooms, hard-boiled eggs, cheese, and hot grilled chicken on a bed of romaine lettuce. Served with croutons and your choice of dressing.',
                'price' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Quinoa Salmon Salad',
                'category_id' => $saladsId,
                'image' => 'quinoa_salmon_salad.jpg',
                'description' => 'Our quinoa salad is served with quinoa, tomatoes, cucumber, scallions, and smoked salmon. Served with your choice of dressing.',
                'price' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Entrees

            [
                'name' => 'Classic Burger',
                'category_id' => $entreesId,
                'image' => 'classic_burger.jpg',
                'description' => 'Our classic burger is made with 100% pure angus beef, served with lettuce, tomatoes, onions, pickles, and cheese of your choice. Veggie burger available upon request. Served with French fries, fresh fruit, or a side salad.',
                'price' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Tomato Bruschetta Tortellini',
                'category_id' => $entreesId,
                'image' => 'tomato_bruschetta_tortellini.jpg',
                'description' => 'This classic cheese tortellini is cooked in a sundried tomato sauce. Served with bruschetta topped with a tomato and basil marinara.',
                'price' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Handcrafted Pizza',
                'category_id' => $entreesId,
                'image' => 'handcrafted_pizza.jpg',
                'description' => 'Our thin crust pizzas are made fresh daily and topped with your choices of fresh meats, veggies, cheese, and sauce. Price includes two toppings. Add $1 for each additional topping.',
                'price' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Barbecued Tofu Skewers',
                'category_id' => $entreesId,
                'image' => 'barbecued_tofu_skewers.jpg',
                'description' => 'Our barbecued skewers include tofu, cherry tomatoes, bell peppers, and zucchini marinated in a ginger sesame sauce and charbroiled. Served with steamed rice.',
                'price' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Fiesta Family Platter',
                'category_id' => $entreesId,
                'image' => 'fiesta_family_platter.jpg',
                'description' => 'This platter is perfect for sharing! Enjoy our spicy buffalo wings, traditional nachos, and cheese quesadillas served with freshly made guacamole dip.',
                'price' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Desserts

            [
                'name' => 'Crème Brûlée',
                'category_id' => $dessertsId,
                'image' => 'creme_brulee.jpg',
                'description' => 'Elegantly crafted creamy vanilla custard with a caramelized crunchy layer on top. Served with seasonal fruit.',
                'price' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Cheesecake',
                'category_id' => $dessertsId,
                'image' => 'cheesecake.jpg',
                'description' => 'Our New York Style Cheesecake is rich, smooth, and creamy. Available in various flavors, and with seasonal fruit toppings.',
                'price' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Chocolate Chip Brownie',
                'category_id' => $dessertsId,
                'image' => 'chocolate_chip_brownie.jpg',
                'description' => 'A warm chocolate chip brownie served with chocolate or vanilla ice cream and rich chocolate sauce.',
                'price' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Apple Pie',
                'category_id' => $dessertsId,
                'image' => 'apple_pie.jpg',
                'description' => 'Made with local granny smith apples to bring you the freshest classic apple pie available.',
                'price' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Mixed Berry Tart',
                'category_id' => $dessertsId,
                'image' => 'mixed_berry_tart.jpg',
                'description' => 'Raspberries, blueberries, and strawberries on top of a creamy filling served in a crispy tart.',
                'price' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
