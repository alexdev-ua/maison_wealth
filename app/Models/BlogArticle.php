<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    const STATUS_DRAFT = -1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'url',
        'page_banner_id',
        'status'
    ];

    public function translate($langId){
        $articleTranslate = BlogArticleTranslate::where('blog_article_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if(!$articleTranslate){
            $lang = Lang::first();
            if($lang){
                $articleTranslate = BlogArticleTranslate::where('blog_article_id', '=', $this->id)->where('lang_id', '=', $lang->id)->first();
            }
        }

        if($articleTranslate){
            return $articleTranslate;
        }
        return new BlogArticleTranslate;
    }

    public function options(){
        return $this->hasMany('App\Models\BlogArticleOption', 'blog_article_id');
    }

    public function screens(){
        return $this->hasMany('App\Models\BlogArticleScreen', 'blog_article_id');
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
            BlogArticleTranslate::where('blog_article_id', '=', $id)->delete();
            $options = $this->options;
            if($options){
                foreach ($options as $option) {
                    $option->deleteAllData();
                }
            }
            $screens = $this->screens;
            if($screens){
                foreach ($screens as $screen) {
                    $screen->deleteAllData();
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

    public function date(){
        $time = strtotime($this->created_at);

        return date("d/m/Y", $time);
    }

    public static function getAll(){
        return BlogArticle::where('status', '=', BlogArticle::STATUS_ACTIVE)->get();
    }

    public static function getByKey($key){
        $article = BlogArticle::where('status', '=', BlogArticle::STATUS_ACTIVE)->where('url', '=', $key)->first();
        if($article){
            return $article;
        }
        return null;
    }
}
