<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareService extends Model
{
    protected $fillable = [
        'care_services_name',
        'care_services_description',
        'single_services_price',
        'triple_services_price',
        'seven_services_price',
        'care_services_image',
        'care_services_priority',
        'care_services_status',
    ];
    
    
}
