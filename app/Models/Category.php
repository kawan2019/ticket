<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table = "Category";
    protected $fillable = [
        'ID',
        'Category',
        'State',
    ];
    use HasFactory;
}