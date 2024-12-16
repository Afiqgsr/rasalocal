<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'menu_id', 'title', 'price', 'quantity', 'user_id'
    ];

    /**
     * Relasi Cart belongsTo User.
     * Setiap Cart memiliki satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
