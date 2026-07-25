<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus dulu semua menu lama, lalu reset auto increment
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Menu::truncate();
        DB::statement('ALTER TABLE menus AUTO_INCREMENT = 1');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $menuData = [
            // Coffee (2 menu)
            ['category' => 'Coffee', 'menu_name' => 'Espresso', 'price' => 18000, 'status' => 'Ready'],
            ['category' => 'Coffee', 'menu_name' => 'Cappuccino', 'price' => 25000, 'status' => 'Ready'],
            // Non-Coffee (2 menu)
            ['category' => 'Non-Coffee', 'menu_name' => 'Green Tea', 'price' => 22000, 'status' => 'Ready'],
            ['category' => 'Non-Coffee', 'menu_name' => 'Chocolate Milkshake', 'price' => 28000, 'status' => 'Ready'],
            // Pastry (2 menu)
            ['category' => 'Pastry', 'menu_name' => 'Croissant', 'price' => 15000, 'status' => 'Ready'],
            ['category' => 'Pastry', 'menu_name' => 'Blueberry Muffin', 'price' => 16000, 'status' => 'Ready'],
            // Heavy Meal (2 menu)
            ['category' => 'Heavy Meal', 'menu_name' => 'Chicken Steak', 'price' => 42000, 'status' => 'Ready'],
            ['category' => 'Heavy Meal', 'menu_name' => 'Beef Burger', 'price' => 38000, 'status' => 'Ready'],
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
