<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomList extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function items(){
        return $this->hasMany('App\Models\ListItem', 'list_id');
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            $listItems = ListItem::where('list_id', '=', $id)->get();
            if($listItems){
                foreach($listItems as $listItem){
                    $listItem->deleteAllData();
                }
            }
            return true;
        }
        return false;
    }
}
