<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const STATUS_DRAFT = -1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'direction_id',
        'url',
        'price',
        'square',
        'price_per_square',
        'for_living',
        'for_resale',
        'for_long_rent',
        'for_daily_rent',
        'preview_image_id',
        'page_banner_id',
        'status',
        'on_main'
    ];

    public function translate($langId){
        $propertyTranslate = PropertyTranslate::where('property_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if(!$propertyTranslate){
            $lang = Lang::first();
            if($lang){
                $propertyTranslate = PropertyTranslate::where('property_id', '=', $this->id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($propertyTranslate){
            return $propertyTranslate;
        }
        return new PropertyTranslate;
    }

    public function getDirection(){
        return Direction::find($this->direction_id);
    }

    public function direction($langId){
        $directionTranslate = DirectionTranslate::where('direction_id', '=', $this->direction_id)->where('lang_id', '=', $langId)->first();

        if(!$directionTranslate){
            $lang = Lang::first();
            if($lang){
                $directionTranslate = DirectionTranslate::where('direction_id', '=', $this->direction_id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($directionTranslate){
            return $directionTranslate->title;
        }
        return null;
    }

    public function options(){
        return $this->hasMany('App\Models\PropertyOption', 'property_id');
    }
    public function features(){
        return $this->hasMany('App\Models\PropertyFeature', 'property_id');
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
            PropertyTranslate::where('property_id', '=', $id)->delete();
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

    public function forPurposes(){
        $purposes = [];

        if($this->for_living){
            $purposes[] = 'For living';
        }
        if($this->for_resale){
            $purposes[] = 'For resale';
        }
        if($this->for_long_rent){
            $purposes[] = 'For long term rental';
        }
        if($this->for_daily_rent){
            $purposes[] = 'For daily rent';
        }

        return implode(' / ', $purposes);
    }

    public function price(){
        return number_format($this->price, 0, '.', ' ');
    }

    public static function getAll($location, $options){
        $properties = Property::where('status', '=', Property::STATUS_ACTIVE);
        if($location != 'all'){
            $direction = Direction::where('url', '=', $location)->first();

            $directionId = 0;

            if($direction){
                $directionId = $direction->id;
            }

            $properties = $properties->where('direction_id', '=', $directionId);
        }
        if(isset($options['price'])){
            $properties = $properties->where('price', '<=', $options['price']);
        }

        $properties = $properties->get();

        return $properties;
    }

    public static function getByKey($key){
        $properties = Property::where('status', '=', Property::STATUS_ACTIVE)->where('url', '=', $key)->first();
        if($properties){
            return $properties;
        }
        return null;
    }

    public static function getFacilities(){
        $facilities = Property::where('status', '=', Property::STATUS_ACTIVE)->where('on_main', '=', 1)->get();

        return $facilities;
    }

}
