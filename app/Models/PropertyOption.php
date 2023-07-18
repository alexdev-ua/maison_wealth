<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id'
    ];

    public function translate($langId){
        $optionTranslate = PropertyOptionTranslate::where('property_option_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($optionTranslate){
            return $optionTranslate;
        }
        return new PropertyOptionTranslate;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            PropertyOptionTranslate::where('property_option_id', '=', $id)->delete();
            return true;
        }
        return false;
    }

}
