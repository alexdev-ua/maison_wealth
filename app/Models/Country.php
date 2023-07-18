<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function translate($langId){
        $countryTranslate = CountryTranslate::where('country_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($countryTranslate){
            return $countryTranslate;
        }
        return new CountryTranslate;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            CountryTranslate::where('country_id', '=', $id)->delete();
            return true;
        }
        return false;
    }

}
