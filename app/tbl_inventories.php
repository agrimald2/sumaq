<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_inventories extends Model
{
    protected $table= 'tbl_inventories';

    protected $fillable = [
        'products_id','sucursals_id','inventories_image_url','inventories_codigo','sales_id','purchase_orders_id','user_id'
    ];

    protected $primaryKey='inventories_id';
}
