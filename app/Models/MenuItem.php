<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\indexController;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category', 
        'image', 
        'description', 
        'price'
    ];

    protected $table = 'menu_items';

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

}
