<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        $car2 = str_replace(",", "", $total);
        $tota = str_replace(',00', '', number_format($car2, 2, ',', ''));
        // dd($tota);
        if ($this->type == 'fixed') {
            return $this->value;
        } else if ($this->type == 'percent') {
            return ($this->percent_off / 100) * $tota;
        } else {
            return 0;
        }
    }
}
