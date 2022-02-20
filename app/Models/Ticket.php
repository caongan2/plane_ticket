<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';
    protected $fillable = [
        'user_name',
        'from',
        'to',
        'number_phone',
        'departure_date',
        'return_date',
        'category',
        'amount_adults',
        'amount_children_less_12',
        'amount_children_less_2'
    ];
}
