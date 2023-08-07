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
use App\Models\Testimonial;

use App\Models\Helper;
use App\Models\KommoCRM;

class IndexController extends Controller
{
    public function index(Request $request){
        $this->setPageMeta('home');

        $utm = [];
        // utm labels for CRM
        if($request->utm_content){
            $utm['UTM_CONTENT'] = $request->utm_content; // 1220910
        }
        if($request->utm_medium){
            $utm['UTM_MEDIUM'] = $request->utm_medium; // 1220912
        }
        if($request->utm_campaign){
            $utm['UTM_CAMPAIGN'] = $request->utm_campaign; // 1220914
        }
        if($request->utm_source){
            $utm['UTM_SOURCE'] = $request->utm_source; // 1220916
        }
        if($request->utm_term){
            $utm['UTM_TERM'] = $request->utm_term; // 1220918
        }
        if($request->utm_referrer){
            $utm['UTM_REFERRER'] = $request->utm_referrer; // 1220920
        }
        if($request->fbclid){
            $utm['FBCLID'] = $request->fbclid; // 1220928
        }
        if($request->gclid){
            $utm['GCLID'] = $request->gclid; // 1220926
        }

        if(count($utm)){
            Cookie::queue(Cookie::make('utm', json_encode($utm), 60*24*30));
        }

        $directions = Direction::getAll();
        $facilities = Property::getFacilities();

        return View::make('pages.'.$this->viewPath .'.home')->with([
            'activePage' => 'home',
            'directions' => $directions,
            'facilities' => $facilities
        ]);
    }

    public function properties($location='all', Request $request){
        $this->setPageMeta('properties');

        $options = [];
        if($request->price){
            $options['price'] = $request->price;
        }
        $properties = Property::getAll($location, $options);

        $directions = Direction::getAll();

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
                'partial' => false,
                'activePage' => 'properties',
                'directions' => $directions
            ]);
        }
    }

    public function propertyView($property, Request $request){
        $propertyItem = Property::getByKey($property);
        if(!$propertyItem){
            abort(404);
        }
        $this->setPageMeta('property-view', ['property' => $propertyItem->translate($this->activeLang)->title]);

        return View::make('pages.'.$this->viewPath .'.property_view')->with([
            'property' => $propertyItem,
            'activePage' => 'property-view',
        ]);
    }

    public function country(Request $request){
        $this->setPageMeta('countries');

        $directions = Direction::getAll();

        return View::make('pages.'.$this->viewPath .'.country')->with([
            'activePage' => 'countries',
            'directions' => $directions
        ]);
    }

    public function directionView($direction, Request $request){
        $directionItem = Direction::getByKey($direction);
        if(!$directionItem){
            abort(404);
        }
        $this->setPageMeta('direction-view', ['direction' => $directionItem->translate($this->activeLang)->title]);

        return View::make('pages.'.$this->viewPath .'.direction_view')->with([
            'direction' => $directionItem,
            'activePage' => 'direction-view',
        ]);
    }

    public function about(){
        $this->setPageMeta('about');

        $testimonials = Testimonial::getAll();

        return View::make('pages.'.$this->viewPath .'.about')->with([
            'activePage' => 'about',
            'testimonials' => $testimonials
        ]);
    }

    public function blog(){
        $this->setPageMeta('blog');

        $articles = BlogArticle::getAll();

        return View::make('pages.'.$this->viewPath .'.blog')->with([
            'activePage' => 'blog',
            'articles' => $articles
        ]);
    }

    public function articleView($article, Request $request){
        $articleItem = BlogArticle::getByKey($article);

        if(!$articleItem){
            abort(404);
        }

        $this->setPageMeta('article-view', ['article' => $articleItem->translate($this->activeLang)->title]);

        return View::make('pages.'.$this->viewPath .'.article_view')->with([
            'activePage' => 'article-view',
            'article' => $articleItem
        ]);
    }

    public function cookies(Request $request){
        $accept = $request->accept;
        Cookie::queue(Cookie::make('acceptCookies', $accept, 60*24*30*12));
    }

    public function terms(Request $request){
        $this->setPageMeta('terms');

        return View::make('pages.'.$this->viewPath .'.terms')->with([
            'activePage' => 'terms'
        ]);
    }


    public function contacts(){
        $this->setPageMeta('contacts');

        return View::make('pages.'.$this->viewPath .'.contacts')->with([
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

            if(strpos($firstName, 'Awaps') === false && strpos($lastName, 'Awaps') === false){
                $hasWhatsapp = 0;
                if($requestType == 'consultation'){
                    $hasWhatsapp = $request->has_whatsapp ? 1 : 0;
                    $data['has_whatsapp'] = $hasWhatsapp;
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

                    $country = Helper::getCountryByCode($phoneCode);
                    if($country){
                        $data['country_code'] = $country['code'];
                    }

                    $formRequest->fill($data)->save();

                    $contactParams = [
                        "first_name" => $firstName,
                        "last_name" => $lastName,
                        "phone" => $phone,
                        "id" => $formRequest->id,
                        "page" => $formRequest->page
                    ];

                    if($requestType == 'contact'){
                        $message = $request->message;
                        $notification = "Contact form:" . "%0A" . "Page: " . $formRequest->page . "%0A" . "First Name: " . $firstName . "%0A" . "Last Name: " . $lastName . "%0A" . "Phone: " . $phone . "%0A" . "Email: " . $email . "%0A" . "Message: " . $message;

                        $contactParams["email"] = $email;
                        //$contactParams["message"] = $message;
                    }else{
                        if($requestType == 'consultation'){
                            $notification = "Consultation form:" . "%0A" . "Page: " . $formRequest->page . "%0A" . "First Name: " . $firstName . "%0A" . "Last Name: " . $lastName . "%0A" . "Phone: " . $phone . "%0A" . "Has WhatsApp: " . ($hasWhatsapp ? 'yes' : 'no');

                            if($hasWhatsapp){
                                $contactParams["WhatsApp"] = $hasWhatsapp;
                            }
                        }
                    }

                    $utm = Cookie::get('utm', null);
                    if($utm){
                        $utm = json_decode($utm);
                        $contactParams['utm'] = $utm;
                    }
                    $log = [
                        'project' => 'maisonwealth.com',
                        'type' => 'Forms requests',
                        'requestType' => $requestType,
                        'params' => $contactParams,
                    ];

                    $log['result'] = KommoCRM::sendLead($contactParams, $requestType);

                    // send logs
                    Helper::sendTelegramLogs(json_encode($log), "-909344007");

                    // send requests to telegram
        	        Helper::sendTelegramNotification($notification, "-905680561");

                    /*if($requestType == 'popup-consultation'){
                        Cookie::queue(Cookie::make('popupConsultShowed', 1, 60*24*30));
                    }*/
                }
            }

            return response(['success' => true], 200);
	    }else{
			return response(['errors' => $validator->errors()], 422);
		}
    }

}
