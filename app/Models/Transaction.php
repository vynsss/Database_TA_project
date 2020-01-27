<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'item_id',
        'bill_id',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }
}
