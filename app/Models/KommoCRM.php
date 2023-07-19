<?php

namespace App\Models;

class KommoCRM
{
    const KOMMO_URL = 'https://maisonwealthlily.kommo.com/';
    const KOMMO_CLIENT_ID = 'fbd0aab5-2f86-411c-8a1a-65b495825e1b';
    const KOMMO_CLIENT_SECRET = 'mRMOir9ln6fVXhhczKeEjJoLQDhWH5RAoxYpmES8bChnHPZQx1BlJRiJt354sm5u';

    public static function accessToken(){
        $url = self::KOMMO_URL . '/oauth2/access_token';

        $data = [
        	'client_id' => self::KOMMO_CLIENT_ID,
        	'client_secret' => self::KOMMO_CLIENT_SECRET,
        	'grant_type' => 'authorization_code',
        	'code' => 'def5020040fbe44058c0a69dd393e44b35a0785cf93e5c2a8ff71963e59dd97471e1eed6fd12fba9cda27f82fd35b9f213ce0d1c092b1912cbf04439576dbaf19ce5a05d938b2d2b7006106a1a3600ce9d0114a5bf29579c265cde395732676d9f0ebe82ffa1a1b10202062fe642be247fb707b5dab64e6ab55f0817d327898de14fd02b484ac93b96e595a02891dcc2c948cff9f1ef5b4ff6efb390f9ca1df8a80bfd1946be3bb3e8fe28ef1143c03b452cf1a27d51975277e55c8e6583e3194afe5c6968426d763ad151e9b852a82801d3639968409679748284046959b847b75f20bc58434ff68183fe3aa69867ea21c6669a16958719dbcab91a907ad60a57944863553d71e972b7110fc42f25ce421aec0f7ef0b305cbbfd021e64a370aca7c0d7f45918f3297f0e740e93b3cd47645e6c5aeb5f4304fd16e6e6788ac97020c9030d3e5953fc7651b57e5dbb25d88ca8d5606c0e14e68ce60841207705952c3a4367d1dfc4d389dac0d0e6c3fa7b9a90eb67b23c327973519fc0fba3c61737c900f0c9dba4f061d5d864708ba8e8fb02db57ddcb63e5f13d61def607a7c947dfba75484144a495b254ee95d4e21da705882d54694d180f7abe413b765ef19748cb5155080639ffc384e9ae32956df49053c6325c09f6e64ca5167fcd56ec16d14c15b19082c50439b11f859868cce0f60557ba978d558',
        	'redirect_uri' => 'https://maisonwealth.com/crm-integration',
        ];

        $headers = ['Content-Type:application/json'];

        $response = Helper::makeRequest($url, 'POST', $headers, json_encode($data));

        if($response){
            $arrParamsKommo = [
            	"access_token" => $response['access_token'],
            	"refresh_token" => $response['refresh_token'],
            	"token_type" => $response['token_type'],
            	"expires_in" => $response['expires_in'],
            	"endTokenTime" => $response['expires_in'] + time(),
            ];

            $arrParamsKommo = json_encode($arrParamsKommo);

            if(!$kommoCRMToken = SystemVariable::where('key', '=', 'kommoCRM_token')->first()){
                $kommoCRMToken = new SystemVariable;
                $kommoCRMToken->key = 'kommoCRM_token';
                $kommoCRMToken->value = $arrParamsKommo;
                $kommoCRMToken->save();
            }
            return $response['access_token'];
        }
    }

    public static function newToken($token) {
    	$url = self::KOMMO_URL . '/oauth2/access_token';

    	$data = [
            'client_id' => self::KOMMO_CLIENT_ID,
        	'client_secret' => self::KOMMO_CLIENT_SECRET,
    		'grant_type' => 'refresh_token',
    		'refresh_token' => $token,
    		'redirect_uri' => 'https://maisonwealth.com/crm-integration',
    	];

        $headers = ['Content-Type:application/json'];

        $response = Helper::makeRequest($url, 'POST', $headers, json_encode($data));

    	if($response){
    		$response["endTokenTime"] = time() + $response["expires_in"];

    		$responseJSON = json_encode($response);

            if(!$kommoCRMToken = SystemVariable::where('key', '=', 'kommoCRM_token')->first()){
                $kommoCRMToken = new SystemVariable;
                $kommoCRMToken->key = 'kommoCRM_token';
            }
            $kommoCRMToken->value = $responseJSON;
            $kommoCRMToken->save();

    		$response = json_decode($responseJSON, true);

    		return $response;
    	}
    	else {
    		return false;
    	}

    }

    public static function addLead($access_token, $contactParams, $type) {
        $url = self::KOMMO_URL . "/api/v4/leads/complex";

        switch($type){
            case 'consultation':{
                $leadTitle = "Lead from site #".$contactParams['id']." - Get consultation";
                break;
            }
            case 'contact': {
                $leadTitle = "Lead from site #".$contactParams['id']." - Contact form";
                break;
            }
            default:{
                $leadTitle = "Lead from site #".$contactParams['id']."";
                break;
            }
        }

        $customFieldsGeneral = [];

        // utm labels
        if(isset($contactParams['utm'])){
            foreach($contactParams['utm'] as $utmLabel=>$utmValue){
                $customFieldsGeneral[] = [
                    "field_code" => $utmLabel,
                    "values" => [
                        [
                            "value" => $utmValue
                        ]
                    ]
                ];
            }
        }

        $customFields = [
            [
                "field_code" => "PHONE",
                "values" => [
                    [
                        "enum_code" => "MOB",
                        "value" => $contactParams['phone']
                    ]
                ]
            ],
        ];

        if(isset($contactParams['email'])){
            $customFields[] = [
                "field_code" => "EMAIL",
                "values" => [
                    [
                        "enum_code" => "PRIV",
                        "value" => $contactParams['email']
                    ]
                ]
            ];
        }

        /*if(isset($contactParams['WhatsApp'])){
            $customFields[] =
            [
                "field_id" => (int)1806824,
                "values" => [
                    [
                        "value" => true
                    ]
                ]
            ];
        }*/

        $leadParams = [
            [
                "name" => $leadTitle,
                "_embedded" => [
                    /*"metadata" => [
                        "category" => "forms",
                        //"form_id" => 123,
                        "form_name" => "Форма на сайте",
                        "form_page" => "https://maisonwealth.com",
                        "form_sent_at" => strtotime(date("Y-m-d H:i:s")),
                        //"ip": "8.8.8.8",
                        //"referer": "https://example.com/form.html"
                    ],*/
                    "contacts" => [
                        [
                            "first_name" => $contactParams['first_name'],
                            'last_name' => $contactParams['last_name'],
                            "custom_fields_values" => $customFields
                        ]
                    ]
                ],
                "custom_fields_values" => $customFieldsGeneral
            ]
        ];

    	$headers = [
            "Accept: application/json",
            'Authorization: Bearer ' . $access_token
    	];


    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    	curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
    	undefined/2.0");
    	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($leadParams));
    	curl_setopt($curl, CURLOPT_URL, $url);
    	curl_setopt($curl, CURLOPT_HEADER,false);
    	//curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__)."/cookie.txt");
    	//curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__)."/cookie.txt");

    	$out = curl_exec($curl);
    	curl_close($curl);
    	$result = json_decode($out,TRUE);

        return $result;
    }

    public static function sendLead($contactParams, $type){
        $kommoCRMToken = SystemVariable::getValue('kommoCRM_token');
        $accessToken = null;

        if($kommoCRMToken){
            $kommoCRMToken = (array)json_decode($kommoCRMToken);
            $expireTime = $kommoCRMToken["endTokenTime"];

            if($expireTime < time()){
                $kommoCRMToken = self::newToken($kommoCRMToken["refresh_token"]);
                /*if($kommoCRMToken){
                    $kommoCRMToken = (array)json_decode($kommoCRMToken);
                }*/
            }

            $accessToken = $kommoCRMToken['access_token'];

        }else{
            $accessToken = self::accessToken();
        }

        if($accessToken){
            return self::addLead($accessToken, $contactParams, $type);
        }

        return false;

    }

}
