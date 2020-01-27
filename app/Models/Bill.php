<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'date',
        'table_no',
        'cashier_id',
        'server_id',
        'service_tax_id',
        'branch_id',
        'close'
    ];

    public function cashier()
    {
        return $this->belongsTo('App\Models\Cashier');
    }

    public function server()
    {
        return $this->belongsTo('App\Models\Server');
    }

    public function service_tax()
    {
        return $this->belongsTo('App\Models\ServiceTax');
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
