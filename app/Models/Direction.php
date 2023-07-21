<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    const STATUS_DRAFT = -1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'url',
        'country_id',
        'preview_image_id',
        'page_banner_id',
        'status',
    ];

    public function translate($langId){
        $directionTranslate = DirectionTranslate::where('direction_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if(!$directionTranslate){
            $lang = Lang::first();
            if($lang){
                $directionTranslate = DirectionTranslate::where('direction_id', '=', $this->id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($directionTranslate){
            return $directionTranslate;
        }
        return new DirectionTranslate;
    }

    public function country($langId){
        $countryId = $this->country_id;
        $countryTranslate = CountryTranslate::where('country_id', '=', $countryId)->where('lang_id', '=', $langId)->first();

        if(!$countryTranslate){
            $lang = Lang::first();
            if($lang){
                $countryTranslate = CountryTranslate::where('country_id', '=', $countryId)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($countryTranslate){
            return $countryTranslate->title;
        }
        return null;
    }

    public function options(){
        return $this->hasMany('App\Models\DirectionOption', 'direction_id');
    }
    public function features(){
        return $this->hasMany('App\Models\DirectionFeature', 'direction_id');
    }

    public function previewImage(){
        $path = public_path('/media');
        $photo = Media::find($this->preview_image_id);
        if($photo){
            if(file_exists($path.'/'.$photo->filename)){
                return $photo->filename();
            }
        }
        return null;
    }
    public function bannerImage(){
        $path = public_path('/media');
        $photo = Media::find($this->page_banner_id);
        if($photo){
            if(file_exists($path.'/'.$photo->filename)){
                return $photo->filename();
            }
        }
        return null;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            DirectionTranslate::where('direction_id', '=', $id)->delete();
            $options = $this->options;
            if($options){
                foreach ($options as $option) {
                    $option->deleteAllData();
                }
            }
            $features = $this->features;
            if($features){
                foreach ($features as $feature) {
                    $feature->deleteAllData();
                }
            }

            return true;
        }
        return false;
    }

    public function isPublished(){
        return $this->status == self::STATUS_ACTIVE;
    }

    public function isDisabled(){
        return $this->status == self::STATUS_DISABLED;
    }

    public function isDraft(){
        return $this->status == self::STATUS_DRAFT;
    }

    public static function getAll(){
        $directions = Direction::where('status', '=', Direction::STATUS_ACTIVE)->get();

        return $directions;
    }

    public static function getByKey($key){
        $direction = Direction::where('status', '=', Direction::STATUS_ACTIVE)->where('url', '=', $key)->first();
        if($direction){
            return $direction;
        }
        return null;
    }

}
