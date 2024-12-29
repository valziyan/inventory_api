<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'expiry_date',
        'status',
        'inventory_limit',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
