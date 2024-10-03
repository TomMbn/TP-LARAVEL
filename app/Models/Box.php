<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Box extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'city',
    ];

    // Propriétaire de la box
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Locataire actuel de la box
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

