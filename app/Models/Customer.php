<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'customer_id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'customer_id', 'full_name', 'email', 'phone', 'address', 'status',
    ];
}
