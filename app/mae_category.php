<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_category extends Model
{
    protected $table= 'mae_categories';

    protected $fillable = [
        'categories_name','categories_image_url'
    ];

    protected $primaryKey='categories_id';
}
