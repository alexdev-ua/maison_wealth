<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'title',
        'status'
    ];

    public function deleteAllData(){
        if($this->delete()){
            return true;
        }
        return false;
    }

    public static function getActive($getIds = false){
        if($getIds){
            return self::where('status', '=', 1)->pluck('id')->toArray();
        }else{
            return self::where('status', '=', 1)->select('code', 'id')->get();
        }
    }

}
