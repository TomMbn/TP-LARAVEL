<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_end',
        'date_start',
        'monthly_price',
        'user_id',
        'tenant_id',
        'box_id',
        'contract_template_id',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function contractTemplate()
    {
        return $this->belongsTo(ContractTemplate::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function generateBill()
    {
        $startDate = Carbon::parse($this->date_start);
        $currentDate = Carbon::now();
        $monthsSinceStart = $startDate->diffInMonths($currentDate);

        if ($currentDate->day == $startDate->day) {
            $existingBill = Bill::where('contract_id', $this->id)
                                ->where('period_number', $monthsSinceStart + 1)
                                ->first();

            if (!$existingBill) {
                Bill::create([
                    'contract_id' => $this->id,
                    'amount' => $this->monthly_price,
                    'period_number' => round($monthsSinceStart + 1),
                ]);
            }
        }
    }
}
