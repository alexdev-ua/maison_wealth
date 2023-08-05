<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'key',
    ];

    const AVAILABLE_PAGES = [
        'home' => 'Home page',
        'properties' => 'Properties',
        'property-view' => 'Property page',
        'countries' => 'Countries & Directions',
        'direction-view' => 'Direction page',
        'about' => 'About us',
        'blog' => 'Blog',
        'article-view' => 'Blog article page',
        'terms' => 'Terms&Conditions, Privacy policy, Cookies page',
        'contacts' => 'Contacts'
    ];

    public function meta($lang=null){
        $meta = PageMeta::where('page_id', '=', $this->id);
        if($lang){
            $meta = $meta->where('lang_id', '=', $lang)->first();
        }else{
            $meta = $meta->get();
        }
        return $meta;
    }
}
