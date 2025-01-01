<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'type', 
        'description', 
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
