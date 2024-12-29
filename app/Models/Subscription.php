<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    public function userSubscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subscriptions')
                    ->withPivot('start_date', 'expiry_date', 'status')
                    ->withTimestamps();
    }
}
