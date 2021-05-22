<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryT extends Model{
    protected $table = "CategoryT";
    protected $fillable = [
        'ID',
        'Category',
        'State',
    ];
    use HasFactory;
}