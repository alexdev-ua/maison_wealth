<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'has_whatsapp',
        'type',
        'country_code',
        'page'
    ];

    public function fullName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function date(){
        $time = strtotime($this->created_at);

        return date("d.m.Y H:i", $time);
    }

    public static function getNew(){
        $today = date("Y-m-d");

        return self::where('created_at',  'like', $today.'%')->count();
    }

    public function isNew(){
        $today = strtotime(date("d.m.Y H:i:s"));

        $requestTime = strtotime($this->created_at);

        return ($today - $requestTime < 60*60*24) ? true : false;
    }
}
