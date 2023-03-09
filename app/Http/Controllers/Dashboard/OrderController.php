<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;

class OrderController extends Controller
{
	public function index(){
		$data = [
			'title' => 'Dashboard - Contacts form',
		];

		$contactForms = Order::get();

		return View::make('dashboard.pages.'.$this->viewPath.'.contact_forms.index')->with([
			'data' => $data,
			'contactForms' => $contactForms,
			'admin' => Auth::user(),
		]);
	}

}
