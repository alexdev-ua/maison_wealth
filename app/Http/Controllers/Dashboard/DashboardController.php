<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
	public function index(){
		$data = [
			'title' => 'Dashboard',
			'page' => 'home',
		];

		return View::make('dashboard.pages.'.$this->viewPath.'.index')->with([
			'data' => $data,
			'admin' => Auth::user(),
		]);
	}

}
