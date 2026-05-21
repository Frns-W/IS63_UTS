<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Menu;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
public function definition(): array
{
    $menu = Menu::inRandomOrder()->first() ?? Menu::factory()->create();
    $quantity = $this->faker->numberBetween(1, 3);

    return [
        'menu_id' => $menu->id,
        'customer_name' => $this->faker->name,
        'quantity' => $quantity,
        'total_price' => $menu->price * $quantity, // Otomatis mengalikan harga menu
        'payment_method' => $this->faker->randomElement(['Cash', 'QRIS', 'Debit Card']),
    ];
}
}