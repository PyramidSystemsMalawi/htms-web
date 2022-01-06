<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseOfficer extends Model
{
    use HasFactory;
    public $fillable = [
        'officer'
    ];
}
