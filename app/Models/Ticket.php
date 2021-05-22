<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model{
    protected $table = "Ticket";
    protected $fillable = [
        'creator',
        'type',
        'typet',
        'description',
        'create_date',
        'tikit_state',
        'supervisor_approval'
    ];
    use HasFactory;
}