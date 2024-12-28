<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'inventory_limit', 'start_date', 'expiry_date', 'status'];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
