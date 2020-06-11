<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_note', 
        'billing_discount_code', 'billing_discount', 'billing_subtotal', 'billing_ongkir', 'billing_total', 'error', 'statuses_id','code', 'payment_token',
         'payment_url', 'status', 'payment_status'
    ];

    public const CREATED = 'created';
    public const CONFIRMED = 'confirmed';
    public const DELIVERED = 'delivered';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';

    public const ORDERCODE = 'INV';

    public const PAID = 'paid';
    public const UNPAID = 'unpaid';

    public const STATUSES = [
        self::CREATED => 'Created',
        self::CONFIRMED => 'Confirmed',
        self::DELIVERED => 'Delivered',
        self::COMPLETED => 'Completed',
        self::CANCELLED => 'Cancelled',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_product')->withPivot('quantity');
    }

    public function statuse()
    {
        return $this->belongsTo('App\Status', 'statuses_id', 'id');
    }

    public static function generateCode()
    {
        $dateCode = self::ORDERCODE . '/' . date('Ymd') . '/' . \General::integerToRoman(date('m')) . '/' . \General::integerToRoman(date('d')) . '/';

        $lastOrder = self::select([\DB::raw('MAX(orders.code) AS last_code')])
            ->where('code', 'like', $dateCode . '%')
            ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int) $lastOrderNumber + 1);

            $orderCode = $dateCode . $nextOrderNumber;
        }
        // dd($orderCode);

        if (self::_isOrderCodeExists($orderCode)) {
            return generateOrderCode();
        }

        return $orderCode;
    }

    private static function _isOrderCodeExists($orderCode)
    {
        return Order::where('code', '=', $orderCode)->exists();
    }

    public function isPaid()
    {
        return $this->payment_status == self::PAID;
    }
}
