<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
  public function index(){
    return View::make('pages.'.$this->viewPath .'.home')->with([

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
