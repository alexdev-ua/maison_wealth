<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

use App\Models\Property;
use App\Models\BlogArticle;

class IndexController extends Controller
{
    public function index(){
        $pageData = [
            'title' => 'Maison Wealth',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        return View::make('pages.'.$this->viewPath .'.home')->with([
            'pageData' => $pageData,
            'activePage' => 'home',
        ]);
    }

    public function properties($location='all', Request $request){
        $pageData = [
            'title' => 'Maison Wealth - Properties',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        $options = [];
        if($request->price){
            $options['price'] = $request->price;
        }
        $properties = Property::getAll($location, $options);
        if($request->partial){
            return View::make('includes.'.$this->viewPath .'.properties_list')->with([
                'properties' => $properties,
                'investPrice' => $request->price,
                'partial' => true,
            ]);
        }else{
            return View::make('pages.'.$this->viewPath .'.properties')->with([
                'location' => $location,
                'properties' => $properties,
                'investPrice' => $request->price,
                'pageData' => $pageData,
                'partial' => false,
                'activePage' => 'properties',
            ]);
        }
    }

    public function propertyView($property, Request $request){
        $pageData = [
            'title' => 'Maison Wealth',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        $propertyItem = Property::getByKey($property);
        if(!$propertyItem){
            abort(404);
        }

        return View::make('pages.'.$this->viewPath .'.property_view')->with([
            'property' => $propertyItem,
            'pageData' => $pageData,
            'activePage' => 'property-view',
        ]);
    }

    public function country(Request $request){
        $pageData = [
            'title' => 'Maison Wealth - Countries',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        return View::make('pages.'.$this->viewPath .'.country')->with([
            'pageData' => $pageData,
            'activePage' => 'countries',
        ]);
    }

    public function about(){
        $pageData = [
            'title' => 'Maison Wealth - About us',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        return View::make('pages.'.$this->viewPath .'.about')->with([
            'pageData' => $pageData,
            'activePage' => 'about',
        ]);
    }

    public function blog(){
        $pageData = [
            'title' => 'Maison Wealth - Blog',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];

        $articles = BlogArticle::getAll();

        return View::make('pages.'.$this->viewPath .'.blog')->with([
            'pageData' => $pageData,
            'activePage' => 'blog',
            'articles' => $articles
        ]);
    }

    public function articleView($article, Request $request){
        $pageData = [
            'title' => 'Maison Wealth',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];

        $articleItem = BlogArticle::getByKey($article);

        if(!$articleItem){
            abort(404);
        }

        return View::make('pages.'.$this->viewPath .'.article_view')->with([
            'pageData' => $pageData,
            'activePage' => 'article-view',
            'article' => $articleItem
        ]);
    }

    public function cookies(Request $request){
        $accept = $request->accept;
        Cookie::queue(Cookie::make('acceptCookies', $accept, 60*24*30*12));
    }


    public function contacts(){
        $pageData = [
            'title' => 'Maison Wealth - Contacts',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        return View::make('pages.'.$this->viewPath .'.contacts')->with([
            'pageData' => $pageData,
            'activePage' => 'contacts',
        ]);
    }

}
