<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_order_details extends Model
{
    protected $table= 'purchase_order_details';

    protected $fillable = [
        'purchase_orders_id',
        'products_id',
        'total_products',
        'total_price',
        'net_price'
    ];

    protected $primaryKey='purchase_order_details_id';
}
