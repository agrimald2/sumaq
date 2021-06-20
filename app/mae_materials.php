<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_materials extends Model
{
    protected $table= 'mae_materials';

    protected $fillable = [
        'materials_name','materials_image_url'
    ];

    protected $primaryKey='materials_id';
}
