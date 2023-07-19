<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticleScreen extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_article_id',
        'align',
        'media_id',
        'list_id',
        'is_fixed'
    ];

    public function translate($langId){
        $screenTranslate = BlogArticleScreenTranslate::where('blog_article_screen_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if(!$screenTranslate){
            $lang = Lang::first();
            if($lang){
                $screenTranslate = BlogArticleScreenTranslate::where('blog_article_screen_id', '=', $this->id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($screenTranslate){
            return $screenTranslate;
        }
        return new BlogArticleScreenTranslate;
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
            BlogArticleScreenTranslate::where('blog_article_screen_id', '=', $id)->delete();
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
