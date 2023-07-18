<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'list_id'
    ];

    public function translate($langId){
        $listItemTranslate = ListItemTranslate::where('list_item_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($listItemTranslate){
            return $listItemTranslate;
        }
        return new ListItemTranslate;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            ListItemTranslate::where('list_item_id', '=', $id)->delete();
            return true;
        }
        return false;
    }
}
