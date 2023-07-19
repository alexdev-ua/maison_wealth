<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'direction_id'
    ];

    public function translate($langId){
        $optionTranslate = DirectionOptionTranslate::where('direction_option_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if(!$optionTranslate){
            $lang = Lang::first();
            if($lang){
                $optionTranslate = DirectionOptionTranslate::where('direction_option_id', '=', $this->id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($optionTranslate){
            return $optionTranslate;
        }
        return new DirectionOptionTranslate;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            DirectionOptionTranslate::where('direction_option_id', '=', $id)->delete();
            return true;
        }
        return false;
    }
}
