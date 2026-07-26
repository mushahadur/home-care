<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'care_service_id',
        'service_plan',

        'user_name',
        'user_email',
        'user_phone',
        'user_address',

        'prescription',
        'notes',

        'preferred_date',
        'preferred_time',

        'tax',
        'total_price',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'tax' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function careService()
    {
        return $this->belongsTo(CareService::class);
    }

    // Status Helpers
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    // Accessor
    public function getFormattedTotalAttribute()
    {
        return '৳' . number_format($this->total_price, 2);
    }

    //Order Model Event
    protected static function booted()
    {
        static::creating(function ($order) {

            $user = User::find($order->user_id);

            if (!$user->phone && $order->user_phone) {
                $user->phone = $order->user_phone;
            }

            if (!$user->address && $order->user_address) {
                $user->address = $order->user_address;
            }

            $user->save();
        });
    }
}
