<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_discounts extends Model
{
    protected $table= 'mae_discounts';

    protected $fillable = [
        'discounts_porcentaje','discounts_start_date','discounts_end_date','user_id','discounts_stock_max'
    ];

    protected $primaryKey='discounts_id';
}
