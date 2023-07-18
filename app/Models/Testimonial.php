<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    public function translate($langId){
        $testimonialTranslate = TestimonialTranslate::where('testimonial_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($testimonialTranslate){
            return $testimonialTranslate;
        }
        return new TestimonialTranslate;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            TestimonialTranslate::where('testimonial_id', '=', $id)->delete();
            return true;
        }
        return false;
    }
}
