<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_collections extends Model
{

    protected $table= 'mae_collections';

    protected $fillable = [
        'collections_name','collections_image_url'
    ];

    protected $primaryKey='collections_id';

}
