<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

use App\Models\Property;

class IndexController extends Controller
{
  public function index(){
    return View::make('pages.'.$this->viewPath .'.home')->with([

    ]);
  }

  public function properties($location='all', Request $request){
      $properties = Property::getAll($location);
      return View::make('pages.'.$this->viewPath .'.properties')->with([
          'location' => $location,
          'properties' => $properties,
      ]);
  }

  public function about(){
    return View::make('pages.'.$this->viewPath .'.about')->with([

    ]);
  }

  public function contacts(){
    return View::make('pages.'.$this->viewPath .'.contacts')->with([

    ]);
  }

  public function team(){
    return View::make('pages.'.$this->viewPath .'.team')->with([

    ]);
  }

}
