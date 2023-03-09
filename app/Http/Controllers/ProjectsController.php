<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
  public function index(){
    return View::make('pages.'.$this->viewPath .'.projects.index')->with([

    ]);
  }

  public function profile($project){
    return View::make('pages.'.$this->viewPath .'.projects.'.$project.'.profile')->with([

    ]);
  }

  public function villas(){
    return View::make('pages.'.$this->viewPath .'.projects.villas')->with([

    ]);
  }

  public function order(){
    return View::make('pages.'.$this->viewPath .'.projects.order')->with([

    ]);
  }

  public function saveOrder(Request $request){

    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:255'],
      'phone' => ['required', 'string', 'email', 'max:255'],
		]);

		if($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		}else{

    }


  }

  public function gallery(){
    return View::make('pages.'.$this->viewPath .'.projects.gallery');
  }

}
