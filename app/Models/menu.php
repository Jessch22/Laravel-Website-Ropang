<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'foodName',
        'foodPrice',
        'foodImage',
        'foodDescription',
        'foodCategory',
        'created_at',
        'updated_at',
    ];

    protected $table = 'menus';
}
