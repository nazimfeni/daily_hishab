<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hisab extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'amount','category_type'];
}
