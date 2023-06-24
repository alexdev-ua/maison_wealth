<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

use App\Models\Property;
use App\Models\BlogArticle;
use App\Models\Direction;
use App\Models\FormRequest;

use App\Models\Helper;

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

        $directions = Direction::getAll();

        return View::make('pages.'.$this->viewPath .'.country')->with([
            'pageData' => $pageData,
            'activePage' => 'countries',
            'directions' => $directions
        ]);
    }

    public function directionView($direction, Request $request){
        $pageData = [
            'title' => 'Maison Wealth',
            'description' => 'Maison Wealth is a professional real estate investment firm offering customized solutions and a proven track record of analyzing and identifying lucrative investment opportunities. Our main goal is to maximize your profits by offering exclusive deals on rare land and real estate projects that maintain their value over time. What are you waiting for? Start to Invest!'
        ];
        $directionItem = Direction::getByKey($direction);
        if(!$directionItem){
            abort(404);
        }

        return View::make('pages.'.$this->viewPath .'.direction_view')->with([
            'direction' => $directionItem,
            'pageData' => $pageData,
            'activePage' => 'direction-view',
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

    public function sendRequest(Request $request){
        $validation = [
            'first_name' => ['required'],
            'last_name' => ['required'],
      		'phone' => ['required'],
        ];
        $requestType = $request->type;

	    $phone = $request->phone;

        if($requestType == 'contact'){
            $validation['email'] = ['required', 'email'];
        }

        $validator = Validator::make($request->all(), $validation);

	    if($phone){
	      	$validator->after(function ($validator) use ($phone) {
		        $check = true;
		        $numbers = '0123456789';
		        for($i = 0; $i < strlen($phone); $i++){
		          	if(strpos($numbers, $phone[$i]) === false){
			            $check = false;
			            continue;
		          	}
		        }
		        if(!$check){
		          	$validator->errors()->add('phone', 'Wrong phone format');
		        }
	  		});
	    }

        /*$captcha = $request->get('g-recaptcha-response');
        if(!$captcha){
            $validator->after(function ($validator) {
                $validator->errors()->add('g-recaptcha-response', 'reCaptcha error - Not initialized');
            });
        }else{
            if($requestType == 'popup-consultation'){
                $secretKey = "6Ld68YomAAAAAA_jNU_1GZqJ1ueKpxqCPXExtp3t";
            }else{
                $secretKey = "6LcBDYsmAAAAAFqAXXU_oB2cJffb7ti5s9lkXE05";
            }

            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
            $response = file_get_contents($url);
            $responseKeys = json_decode($response,true);
            if(!$responseKeys["success"]) {
                $validator->after(function ($validator) {
                    $validator->errors()->add('g-recaptcha-response', 'reCaptcha error - Not authorized');
                });
            }else{
                if($requestType == 'popup-consultation'){
                    if($responseKeys["score"] < 0.5){
                        $validator->after(function ($validator) {
                            $validator->errors()->add('g-recaptcha-response', 'reCaptcha error - Verification not passed');
                        });
                    }
                }
            }
        }*/

	    if(!$validator->fails()) {
            $firstName = $request->first_name;
            $lastName = $request->last_name;
            $phoneCode = $request->phone_code;
            $phone = $phoneCode.$phone;

            if($requestType == 'consultation'){
                $hasWhatsapp = $request->has_whatsapp;
            }
            if($requestType == 'contact'){
                $email = $request->email;
                $message = $request->message;
            }

            $data = $request->all();
            $data['phone'] = $phone;

            $newRequest = false;

            $formRequest = FormRequest::where('first_name', '=', $firstName)->where('last_name', '=', $lastName)->where('phone', '=', $phone);

            if($requestType == 'contact'){
                $formRequest = $formRequest->where('email', '=', $email)->where('message', '=', $message);
            }
            $formRequest = $formRequest->where('type', '=', $requestType)->first();

            if(!$formRequest){
                $newRequest = true;
            }else{
                if(strtotime(date('Y-m-d H:i:s')) - strtotime($formRequest->created_at) > 60){
                    $newRequest = true;
                }
            }

            if($newRequest){
                $formRequest = new FormRequest;
                $formRequest->fill($data)->save();

                $contactParams = [
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "phone" => $phone,
                    "id" => $formRequest->id
                ];

                if($requestType == 'contact'){
                    $message = $request->message;
                    $notification = "Contact request:" . "%0A" . "First Name: " . $firstName . "%0A" . "Last Name: " . $lastName . "%0A" . "Phone: " . $phone . "%0A" . "Email: " . $email . "%0A" . "Message: " . $message;

                    $contactParams["email"] = $email;
                    $contactParams["message"] = $message;
                }else{
                    if($requestType == 'consultation'){
                        $notification = "Consultation request:" . "%0A" . "First Name: " . $firstName . "%0A" . "Last Name: " . $lastName . "%0A" . "Phone: " . $phone . "%0A" . "Has WhatsApp: " . ($hasWhatsapp ? 'yes' : 'no');

                        $contactParams["has_whatsapp"] = $hasWhatsapp;
                    }
                }

                /*$utm = Cookie::get('utm', null);
                if($utm){
                    $utm = json_decode($utm);
                    $contactParams['utm'] = $utm;
                }*/
                $log = [
                    'project' => 'maisonwealth.com',
                    'type' => 'Forms requests',
                    'requestType' => $requestType,
                    'params' => $contactParams,
                ];

                //$log['result'] = AmoCRM::sendLead($contactParams, $requestType);

                // send logs
                Helper::sendTelegramLogs(json_encode($log), "-909344007");

                // send requests to telegram
    	        Helper::sendTelegramNotification($notification, "-905680561");

                /*if($requestType == 'popup-consultation'){
                    Cookie::queue(Cookie::make('popupConsultShowed', 1, 60*24*30));
                }*/
            }

            return response(['success' => true], 200);
	    }else{
			return response(['errors' => $validator->errors()], 422);
		}
    }

}
