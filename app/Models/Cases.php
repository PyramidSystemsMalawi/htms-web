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
            $reference = self::generateReference();
            $case->reference = $reference;
        });
    }

    private static function generateReference(){
        $_proposed = "HTC".rand(10001, 99999);

        if(count(Cases::where('reference','=',$_proposed)->get()) > 0){
            return self::generateReference();
        }
        return $_proposed;
    }

}
