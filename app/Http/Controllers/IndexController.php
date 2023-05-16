<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

use App\Models\Property;

class IndexController extends Controller
{
    public function index(){
        return View::make('pages.'.$this->viewPath .'.home')->with([

        ]);
    }

    public function properties($location='all', Request $request){
        $options = [];
        if($request->price){
            $options['price'] = $request->price;
        }
        $properties = Property::getAll($location, $options);
        return View::make('pages.'.$this->viewPath .'.properties')->with([
            'location' => $location,
            'properties' => $properties,
            'investPrice' => $request->price
        ]);
    }

    public function propertyView($property, Request $request){
        $propertyItem = Property::getByKey($property);
        if(!$propertyItem){
            abort(404);
        }

        return View::make('pages.'.$this->viewPath .'.property_view')->with([
            'property' => $propertyItem,
        ]);
    }

    public function country(Request $request){
        return View::make('pages.'.$this->viewPath .'.country')->with([

        ]);
    }

    public function about(){
        return View::make('pages.'.$this->viewPath .'.about')->with([

        ]);
    }

    public function blog(){
        return View::make('pages.'.$this->viewPath .'.blog')->with([

        ]);
    }

    public function blogArticle(Request $request){
        return View::make('pages.'.$this->viewPath .'.blog_article')->with([

        ]);
    }

    public function cookies(Request $request){
        $accept = $request->accept;
        Cookie::queue(Cookie::make('acceptCookies', $accept, 60*24*30*12));
    }


    public function contacts(){
        return View::make('pages.'.$this->viewPath .'.contacts')->with([

        ]);
    }

}
