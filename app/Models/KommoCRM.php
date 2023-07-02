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
        	'code' => 'def50200a4a380fa55c6673d92c64b218e46f7deb00d2812e2a9b36438dd4fbabfce2c30fb122c46433647eb5f728e4d5ef0d45ac12176f01a85259ca22fa5d9ae2a3c294d2816c3f8d3109ed758cd7ba21142556d882be44791d9b5b89739f9cb0dcd58afbaba112f1e65fe6cb8f675236442756aa2ba7307859d9e7d064bd643f40a287048dc2c0b20f8f0312c00e07b9080682886b19ccd89d019a216c297f8e3c37b915692cf8c3d02819cb0119cfd86ebd3507c60f54d66b208cd0fe65a48bc1d3f1143ccfb806dd96eeaa141abd42d303d6047b12f1b61a382619dc209634871b2c2e9ce676e6ffb5fbcbc3315d1fb0c5479e3e5db0c993bdd6b9a0981e82ebc0b65720a84ccf502b900a14a6b39a6f59d89f5f8a5b5f46a91c200fdb916d86000433ce03ccf90a4f0af489e91de8f01d2b1060c6479bb8b3c30ace682854fdb58f7f871d95de81118e9f2b49db160c443810fbcc98c3bdcdc3ad5682566fa7f08da11fb7611a45218c8e11339b3484f1fd8ecc545654e6cbcfa870c1969b548820f347f296b0800213a51fcd97b60812d0cd5f140dd8b8a30050f7448a8e81632c1cf5905e76efcc943a74c3fd744510cc37e86bc66e137d4199cf6be239ebb58af286a78355ddd06feffbca468f549f7aad59c4d6c1521b08595d9be9af87561d16e48c9a991b1309c6c53e3fed62c6404096ad8b8',
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
