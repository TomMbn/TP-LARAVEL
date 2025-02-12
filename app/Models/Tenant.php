<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'phone_number',
        'bank_account',
    ];

    /**
     * Get the boxes for the tenant.
     */
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
}
