<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menuData = [
            ['category' => 'Coffee', 'menu_name' => 'Espresso', 'price' => 18000, 'status' => 'Ready'],
            ['category' => 'Coffee', 'menu_name' => 'Cappuccino', 'price' => 25000, 'status' => 'Ready'],
            ['category' => 'Coffee', 'menu_name' => 'Latte', 'price' => 27000, 'status' => 'Ready'],
            ['category' => 'Coffee', 'menu_name' => 'Americano', 'price' => 20000, 'status' => 'Ready'],
            ['category' => 'Non-Coffee', 'menu_name' => 'Green Tea', 'price' => 22000, 'status' => 'Ready'],
            ['category' => 'Non-Coffee', 'menu_name' => 'Chocolate Milkshake', 'price' => 28000, 'status' => 'Ready'],
            ['category' => 'Non-Coffee', 'menu_name' => 'Lemonade', 'price' => 17000, 'status' => 'Ready'],
            ['category' => 'Pastry', 'menu_name' => 'Croissant', 'price' => 15000, 'status' => 'Ready'],
            ['category' => 'Pastry', 'menu_name' => 'Blueberry Muffin', 'price' => 16000, 'status' => 'Ready'],
            ['category' => 'Pastry', 'menu_name' => 'Chocolate Cake', 'price' => 32000, 'status' => 'Ready'],
            ['category' => 'Heavy Meal', 'menu_name' => 'Chicken Steak', 'price' => 42000, 'status' => 'Ready'],
            ['category' => 'Heavy Meal', 'menu_name' => 'Beef Burger', 'price' => 38000, 'status' => 'Ready'],
            ['category' => 'Heavy Meal', 'menu_name' => 'Spaghetti', 'price' => 36000, 'status' => 'Sold Out'],
            ['category' => 'Coffee', 'menu_name' => 'Affogato', 'price' => 29000, 'status' => 'Ready'],
            ['category' => 'Pastry', 'menu_name' => 'Banana Bread', 'price' => 14000, 'status' => 'Ready'],
        ];

        $categories = Category::pluck('id', 'name');

        foreach ($menuData as $menu) {
            Menu::updateOrCreate(
                ['menu_name' => $menu['menu_name']],
                [
                    'category_id' => $categories[$menu['category']] ?? null,
                    'price' => $menu['price'],
                    'status' => $menu['status'],
                ]
            );
        }
    }
}
