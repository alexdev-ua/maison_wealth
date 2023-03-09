<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Telegram;

class OrderController extends Controller
{

  public function contactForm(){
    return View::make('pages.'.$this->viewPath .'.order.contact_form');
  }

  public function saveContactForm(Request $request){

    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:255'],
      'phone' => ['required'],
		]);

		if($validator->fails()) {
		/*	return redirect()->back()
				->withErrors($validator)
				->withInput();*/
      return response()->json([
        'success' => 'false',
        'errors' => $validator->errors(),
      ], 400);
		}else{
      $order = new Order;
      $order->name = $request->name;
      $order->phone = $request->phone;
      $order->email = $request->email;
      if($order->save()){
        /* send telegram message for new request using bot */
        $message = "New request: %0A".($order->email ? "Email: " . $order->email . "%0A" : "") . "Name: " . $order->name . "%0A" . "Phone: " . $order->phone;
        Telegram::sendNotification("-586858260", $message);

        //return redirect()->route('contact-form-success');
        return 'success';
      }
    }
  }

  public function contactFormSuccess(){
    return View::make('pages.'.$this->viewPath .'.order.contact_form_success');
  }

}
