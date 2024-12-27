<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use HasFactory, SoftDeletes; // Tambahkan SoftDeletes

    protected $table = 'menus';
    
    protected $fillable = ['title', 'description', 'price', 'image'];
    
    protected $dates = ['deleted_at']; // Untuk soft delete
}
