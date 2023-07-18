<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticleOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_article_id'
    ];

    public function translate($langId){
        $optionTranslate = BlogArticleOptionTranslate::where('blog_article_option_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($optionTranslate){
            return $optionTranslate;
        }
        return new BlogArticleOptionTranslate;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            BlogArticleOptionTranslate::where('blog_article_option_id', '=', $id)->delete();
            return true;
        }
        return false;
    }
}
