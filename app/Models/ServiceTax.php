<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTax extends Model
{
    protected $fillable = [
        'service',
        'tax',
    ];
}
