<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VictimAssesment extends Model
{
    use HasFactory;


    protected $fillable = [
        'case',
        'victim',
        'FriendlinessOfStaff',
        'Timeliness',
        'Interaction',
        'QualityOfService',
        'Referals',
        'Accessibility',
        'Distance'
    ];
     protected $casts = [
        'created_at'=>'date:Y-m-d',
        'updated_at'=>'date:Y-m-d'
    ];
}
