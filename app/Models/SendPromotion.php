<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendPromotion extends Model
{
    protected $fillable = [
        'customer_id',
        'promotion_id',
        'status',
        'sent_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function promotion() 
    {
        return $this->belongsTo(Promotion::class);
    }

    public static function sendPromotion($customerId, $promotionId)
    {
        try {
            $sendPromotion = self::create([
                'customer_id' => $customerId,
                'promotion_id' => $promotionId,
                'status' => 'sent',
                'sent_at' => now()
            ]);
            return $sendPromotion;
        } catch (\Exception $e) {
            self::create([
                'customer_id' => $customerId,
                'promotion_id' => $promotionId,
                'status' => 'failed',
                'sent_at' => now()
            ]);
            return false;
        }
    }
}