<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Box extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'city',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function isOccupied()
    {
        return $this->contracts()->where('date_end', '>=', now())
                                 ->where('date_start', '<=', now())                         
                                 ->exists();
    }
}

