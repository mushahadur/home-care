<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address',
        'payment_method', 'card_number', 'expiry', 'cvv', 'card_name',
        'notes', 'prescription', 'other_documents',
        'service_id', 'service_charge', 'tax', 'total',
        'status' // new field
    ];

    protected $casts = [
        'other_documents' => 'array',
    ];

    // Order status constants
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_DELIVERED = 'delivered';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';
    const STATUS_RETURNED = 'returned';
    const STATUS_REFUNDED = 'refunded';

    // Helper function for badge class (Bootstrap)
    public function statusBadge(): string
    {
        return match ($this->status) {
            self::STATUS_PENDING => 'warning',
            self::STATUS_PROCESSING => 'primary',
            self::STATUS_SHIPPED => 'info',
            self::STATUS_DELIVERED => 'success',
            self::STATUS_CANCELLED, self::STATUS_FAILED => 'danger',
            self::STATUS_RETURNED, self::STATUS_REFUNDED => 'secondary',
            default => 'light',
        };
    }

    public function service()
{
    return $this->belongsTo(CareService::class, 'id');
}

}
