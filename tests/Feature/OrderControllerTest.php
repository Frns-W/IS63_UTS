<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_an_order_from_the_orders_page(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $menu = Menu::factory()->create([
            'category_id' => $category->id,
            'menu_name' => 'Latte',
            'price' => 25000,
            'status' => 'Ready',
        ]);

        $response = $this->actingAs($user)->post('/orders', [
            'menu_id' => $menu->id,
            'customer_name' => 'Budi',
            'quantity' => 2,
            'payment_method' => 'Cash',
            'order_date' => '2026-08-06',
        ]);

        $response->assertRedirect(route('orders.history'));
        $this->assertDatabaseHas('orders', [
            'menu_id' => $menu->id,
            'customer_name' => 'Budi',
            'quantity' => 2,
            'payment_method' => 'Cash',
            'total_price' => 50000,
        ]);
    }
}
