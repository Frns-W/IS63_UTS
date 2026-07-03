<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'customer_name', 'order_date', 'quantity', 'total_price', 'payment_method'];

    protected $casts = [
        'order_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $order): void {
            $order->order_date = $order->order_date ?? now()->toDateString();
        });
    }

    // Relasi: Orderan ini memesan menu tertentu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
