<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'description', 'subscription_id'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_inventories');
    }

}
