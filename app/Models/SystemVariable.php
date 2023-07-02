<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemVariable extends Model
{
    use HasFactory;

    public static function getValue($key){
        $var = self::where('key', '=', $key)->first();
        if($var){
            return $var->value;
        }
        return null;
    }
}
