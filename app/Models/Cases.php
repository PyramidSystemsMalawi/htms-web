<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Cases;


class Cases extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($case) {
            //Check if case reference isset and
            //if not generate a reference
            if (!isset($case->reference) || empty($case->reference)) {
                $reference = self::generateReference();
                $case->reference = $reference;
            }

        });
    }

    private static function generateReference(){
        $_proposed = "TIP".rand(10001, 99999);

        if(count(Cases::where('reference','=',$_proposed)->get()) > 0){
            return self::generateReference();
        }
        return $_proposed;
    }
    protected $casts = [
        'created_at'=>'date:Y-m-d',
        'updated_at'=>'date:Y-m-d'
    ];

}
