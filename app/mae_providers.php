<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_providers extends Model
{
    
    protected $table= 'mae_providers';

    protected $fillable = [
        'providers_name','providers_id_number','providers_address','providers_encargado','providers_mobile','providers_is_active'
    ];

    protected $primaryKey='providers_id';
}
