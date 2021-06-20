<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_sucursals extends Model
{
    protected $table= 'mae_sucursals';

    protected $fillable = [
        'sucursals_name','sucursals_address','sucursals_is_active'
    ];

    protected $primaryKey='sucursals_id';
}
