<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'menu_name', 'price', 'status'];

    // Relasi: Menu ini termasuk dalam sebuah kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Menu ini bisa ada di banyak orderan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}