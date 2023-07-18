<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTranslate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'type',
        'location_full',
        'payment_plan',
        'completion_date',
        'rent_out',
        'buy_out',
        'offer',
        'payback'
    ];

}
