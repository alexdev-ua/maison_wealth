<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'type',
        'media_id',
        'list_id'
    ];

    public function translate($langId){
        $featureTranslate = PropertyFeatureTranslate::where('property_feature_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if(!$featureTranslate){
            $lang = Lang::first();
            if($lang){
                $featureTranslate = PropertyFeatureTranslate::where('property_feature_id', '=', $this->id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($featureTranslate){
            return $featureTranslate;
        }
        return new PropertyFeatureTranslate;
    }

    public function list(){
        $featureList = CustomList::find($this->list_id);

        if($featureList){
            return $featureList;
        }
        return null;
    }

    public function photo(){
        $path = public_path('/media');
        $photo = Media::find($this->media_id);
        if($photo){
            if(file_exists($path.'/'.$photo->filename)){
                return $photo->filename();
            }
        }
        return null;
    }

    public function deleteAllData(){
        $id = $this->id;
        $listId = $this->list_id;
        if($this->delete()){
            PropertyFeatureTranslate::where('property_feature_id', '=', $id)->delete();
            if($listId){
                $list = CustomList::find($listId);
                if($list){
                    $list->deleteAllData();
                }
            }
            return true;
        }
        return false;
    }
}
