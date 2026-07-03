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
    $safePrice = min((int) ($menu->price ?? 15000), 30000);

    return [
        'menu_id' => $menu->id,
        'customer_name' => $this->faker->name,
        'order_date' => $this->faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
        'quantity' => $quantity,
        'total_price' => $safePrice * $quantity,
        'payment_method' => $this->faker->randomElement(['Cash', 'QRIS', 'Debit Card']),
    ];
}
}