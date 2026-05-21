<?php

namespace database\seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 4 Kategori Dulu supaya Menu bisa terhubung ke Kategori yang sudah ada
        Category::factory(4)->create();

        // 2. Buat 15 Menu acak yang akan terhubung ke kategori di atas
        Menu::factory(15)->create();

        // 3. Buat 30 Transaksi/Orderan acak yang terhubung ke menu di atas
        Order::factory(30)->create();
    }
}