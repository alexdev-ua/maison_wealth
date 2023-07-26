<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;

class Helper
{
    const BOT_TOKEN = "6256828385:AAE3UPJcc81xmk6WGy2vIHLS5d2p9_-gNRg";

    public static $countries = [
		[ 'code' => "DZ", 'phone_code' => "213", 'name' => 'Algeria'],
		[ 'code' => "AD", 'phone_code' => "376", 'name' => 'Andorra'],
		[ 'code' => "AO", 'phone_code' => "244", 'name' => 'Angola'],
		[ 'code' => "AI", 'phone_code' => "1264", 'name' => 'Anguilla'],
		[ 'code' => "AG", 'phone_code' => "1268", 'name' => 'Antigua &amp; Barbuda'],
		[ 'code' => "AR", 'phone_code' => "54", 'name' => 'Argentina'],
		[ 'code' => "AM", 'phone_code' => "374", 'name' => 'Armenia'],
		[ 'code' => "AW", 'phone_code' => "297", 'name' => 'Aruba'],
		[ 'code' => "AU", 'phone_code' => "61", 'name' => 'Australia'],
		[ 'code' => "AT", 'phone_code' => "43", 'name' => 'Austria'],
		[ 'code' => "AZ", 'phone_code' => "994", 'name' => 'Azerbaijan'],
		[ 'code' => "BS", 'phone_code' => "1242", 'name' => 'Bahamas'],
		[ 'code' => "BH", 'phone_code' => "973", 'name' => 'Bahrain'],
		[ 'code' => "BD", 'phone_code' => "880", 'name' => 'Bangladesh'],
		[ 'code' => "BB", 'phone_code' => "1246", 'name' => 'Barbados'],
		[ 'code' => "BY", 'phone_code' => "375", 'name' => 'Belarus'],
		[ 'code' => "BE", 'phone_code' => "32", 'name' => 'Belgium'],
		[ 'code' => "BZ", 'phone_code' => "501", 'name' => 'Belize'],
		[ 'code' => "BJ", 'phone_code' => "229", 'name' => 'Benin'],
		[ 'code' => "BM", 'phone_code' => "1441", 'name' => 'Bermuda'],
		[ 'code' => "BT", 'phone_code' => "975", 'name' => 'Bhutan'],
		[ 'code' => "BO", 'phone_code' => "591", 'name' => 'Bolivia'],
		[ 'code' => "BA", 'phone_code' => "387", 'name' => 'Bosnia Herzegovina'],
		[ 'code' => "BW", 'phone_code' => "267", 'name' => 'Botswana'],
		[ 'code' => "BR", 'phone_code' => "55", 'name' => 'Brazil'],
		[ 'code' => "BN", 'phone_code' => "673", 'name' => 'Brunei'],
		[ 'code' => "BG", 'phone_code' => "359", 'name' => 'Bulgaria'],
		[ 'code' => "BF", 'phone_code' => "226", 'name' => 'Burkina Faso'],
		[ 'code' => "BI", 'phone_code' => "257", 'name' => 'Burundi'],
		[ 'code' => "KH", 'phone_code' => "855", 'name' => 'Cambodia'],
		[ 'code' => "CM", 'phone_code' => "237", 'name' => 'Cameroon'],
		[ 'code' => "CA", 'phone_code' => "1", 'name' => 'Canada'],
		[ 'code' => "CV", 'phone_code' => "238", 'name' => 'Cape Verde Islands'],
		[ 'code' => "KY", 'phone_code' => "1345", 'name' => 'Cayman Islands'],
		[ 'code' => "CF", 'phone_code' => "236", 'name' => 'Central African Republic'],
		[ 'code' => "CL", 'phone_code' => "56", 'name' => 'Chile'],
		[ 'code' => "CN", 'phone_code' => "86", 'name' => 'China'],
		[ 'code' => "CO", 'phone_code' => "57", 'name' => 'Colombia'],
		[ 'code' => "KM", 'phone_code' => "269", 'name' => 'Comoros'],
		[ 'code' => "CG", 'phone_code' => "242", 'name' => 'Congo'],
		[ 'code' => "CK", 'phone_code' => "682", 'name' => 'Cook Islands'],
		[ 'code' => "CR", 'phone_code' => "506", 'name' => 'Costa Rica'],
		[ 'code' => "HR", 'phone_code' => "385", 'name' => 'Croatia'],
		[ 'code' => "CU", 'phone_code' => "53", 'name' => 'Cuba'],
		[ 'code' => "CY", 'phone_code' => "90392", 'name' => 'Cyprus North'],
		[ 'code' => "CY", 'phone_code' => "357", 'name' => 'Cyprus South'],
		[ 'code' => "CZ", 'phone_code' => "42", 'name' => 'Czech Republic'],
		[ 'code' => "DK", 'phone_code' => "45", 'name' => 'Denmark'],
		[ 'code' => "DJ", 'phone_code' => "253", 'name' => 'Djibouti'],
		[ 'code' => "DM", 'phone_code' => "1809", 'name' => 'Dominica'],
		[ 'code' => "DO", 'phone_code' => "1809", 'name' => 'Dominican Republic'],
		[ 'code' => "EC", 'phone_code' => "593", 'name' => 'Ecuador'],
		[ 'code' => "EG", 'phone_code' => "20", 'name' => 'Egypt'],
		[ 'code' => "SV", 'phone_code' => "503", 'name' => 'El Salvador'],
		[ 'code' => "GQ", 'phone_code' => "240", 'name' => 'Equatorial Guinea'],
		[ 'code' => "ER", 'phone_code' => "291", 'name' => 'Eritrea'],
		[ 'code' => "EE", 'phone_code' => "372", 'name' => 'Estonia'],
		[ 'code' => "ET", 'phone_code' => "251", 'name' => 'Ethiopia'],
		[ 'code' => "FK", 'phone_code' => "500", 'name' => 'Falkland Islands'],
		[ 'code' => "FO", 'phone_code' => "298", 'name' => 'Faroe Islands'],
		[ 'code' => "FJ", 'phone_code' => "679", 'name' => 'Fiji'],
		[ 'code' => "FI", 'phone_code' => "358", 'name' => 'Finland'],
		[ 'code' => "FR", 'phone_code' => "33", 'name' => 'France'],
		[ 'code' => "GF", 'phone_code' => "594", 'name' => 'French Guiana'],
		[ 'code' => "PF", 'phone_code' => "689", 'name' => 'French Polynesia'],
		[ 'code' => "GA", 'phone_code' => "241", 'name' => 'Gabon'],
		[ 'code' => "GM", 'phone_code' => "220", 'name' => 'Gambia'],
		[ 'code' => "GE", 'phone_code' => "7880", 'name' => 'Georgia'],
		[ 'code' => "DE", 'phone_code' => "49", 'name' => 'Germany'],
		[ 'code' => "GH", 'phone_code' => "233", 'name' => 'Ghana'],
		[ 'code' => "GI", 'phone_code' => "350", 'name' => 'Gibraltar'],
		[ 'code' => "GR", 'phone_code' => "30", 'name' => 'Greece'],
		[ 'code' => "GL", 'phone_code' => "299", 'name' => 'Greenland'],
		[ 'code' => "GD", 'phone_code' => "1473", 'name' => 'Grenada'],
		[ 'code' => "GP", 'phone_code' => "590", 'name' => 'Guadeloupe'],
		[ 'code' => "GU", 'phone_code' => "671", 'name' => 'Guam'],
		[ 'code' => "GT", 'phone_code' => "502", 'name' => 'Guatemala'],
		[ 'code' => "GN", 'phone_code' => "224", 'name' => 'Guinea'],
		[ 'code' => "GW", 'phone_code' => "245", 'name' => 'Guinea - Bissau'],
		[ 'code' => "GY", 'phone_code' => "592", 'name' => 'Guyana'],
		[ 'code' => "HT", 'phone_code' => "509", 'name' => 'Haiti'],
		[ 'code' => "HN", 'phone_code' => "504", 'name' => 'Honduras'],
		[ 'code' => "HK", 'phone_code' => "852", 'name' => 'Hong Kong'],
		[ 'code' => "HU", 'phone_code' => "36", 'name' => 'Hungary'],
		[ 'code' => "IS", 'phone_code' => "354", 'name' => 'Iceland'],
		[ 'code' => "IN", 'phone_code' => "91", 'name' => 'India'],
		[ 'code' => "ID", 'phone_code' => "62", 'name' => 'Indonesia'],
		[ 'code' => "IR", 'phone_code' => "98", 'name' => 'Iran'],
		[ 'code' => "IQ", 'phone_code' => "964", 'name' => 'Iraq'],
		[ 'code' => "IE", 'phone_code' => "353", 'name' => 'Ireland'],
		[ 'code' => "IL", 'phone_code' => "972", 'name' => 'Israel'],
		[ 'code' => "IT", 'phone_code' => "39", 'name' => 'Italy'],
		[ 'code' => "JM", 'phone_code' => "1876", 'name' => 'Jamaica'],
		[ 'code' => "JP", 'phone_code' => "81", 'name' => 'Japan'],
		[ 'code' => "JO", 'phone_code' => "962", 'name' => 'Jordan'],
		[ 'code' => "KZ", 'phone_code' => "7", 'name' => 'Kazakhstan'],
		[ 'code' => "KE", 'phone_code' => "254", 'name' => 'Kenya'],
		[ 'code' => "KI", 'phone_code' => "686", 'name' => 'Kiribati'],
		[ 'code' => "KP", 'phone_code' => "850", 'name' => 'Korea North'],
		[ 'code' => "KR", 'phone_code' => "82", 'name' => 'Korea South'],
		[ 'code' => "KW", 'phone_code' => "965", 'name' => 'Kuwait'],
		[ 'code' => "KG", 'phone_code' => "996", 'name' => 'Kyrgyzstan'],
		[ 'code' => "LA", 'phone_code' => "856", 'name' => 'Laos'],
		[ 'code' => "LV", 'phone_code' => "371", 'name' => 'Latvia'],
		[ 'code' => "LB", 'phone_code' => "961", 'name' => 'Lebanon'],
		[ 'code' => "LS", 'phone_code' => "266", 'name' => 'Lesotho'],
		[ 'code' => "LR", 'phone_code' => "231", 'name' => 'Liberia'],
		[ 'code' => "LY", 'phone_code' => "218", 'name' => 'Libya'],
		[ 'code' => "LI", 'phone_code' => "417", 'name' => 'Liechtenstein'],
		[ 'code' => "LT", 'phone_code' => "370", 'name' => 'Lithuania'],
		[ 'code' => "LU", 'phone_code' => "352", 'name' => 'Luxembourg'],
		[ 'code' => "MO", 'phone_code' => "853", 'name' => 'Macao'],
		[ 'code' => "MK", 'phone_code' => "389", 'name' => 'Macedonia'],
		[ 'code' => "MG", 'phone_code' => "261", 'name' => 'Madagascar'],
		[ 'code' => "MW", 'phone_code' => "265", 'name' => 'Malawi'],
		[ 'code' => "MY", 'phone_code' => "60", 'name' => 'Malaysia'],
		[ 'code' => "MV", 'phone_code' => "960", 'name' => 'Maldives'],
		[ 'code' => "ML", 'phone_code' => "223", 'name' => 'Mali'],
		[ 'code' => "MT", 'phone_code' => "356", 'name' => 'Malta'],
		[ 'code' => "MH", 'phone_code' => "692", 'name' => 'Marshall Islands'],
		[ 'code' => "MQ", 'phone_code' => "596", 'name' => 'Martinique'],
		[ 'code' => "MR", 'phone_code' => "222", 'name' => 'Mauritania'],
		[ 'code' => "YT", 'phone_code' => "269", 'name' => 'Mayotte'],
		[ 'code' => "MX", 'phone_code' => "52", 'name' => 'Mexico'],
		[ 'code' => "FM", 'phone_code' => "691", 'name' => 'Micronesia'],
		[ 'code' => "MD", 'phone_code' => "373", 'name' => 'Moldova'],
		[ 'code' => "MC", 'phone_code' => "377", 'name' => 'Monaco'],
		[ 'code' => "MN", 'phone_code' => "976", 'name' => 'Mongolia'],
		[ 'code' => "MS", 'phone_code' => "1664", 'name' => 'Montserrat'],
		[ 'code' => "MA", 'phone_code' => "212", 'name' => 'Morocco'],
		[ 'code' => "MZ", 'phone_code' => "258", 'name' => 'Mozambique'],
		[ 'code' => "MN", 'phone_code' => "95", 'name' => 'Myanmar'],
		[ 'code' => "NA", 'phone_code' => "264", 'name' => 'Namibia'],
		[ 'code' => "NR", 'phone_code' => "674", 'name' => 'Nauru'],
		[ 'code' => "NP", 'phone_code' => "977", 'name' => 'Nepal'],
		[ 'code' => "NL", 'phone_code' => "31", 'name' => 'Netherlands'],
		[ 'code' => "NC", 'phone_code' => "687", 'name' => 'New Caledonia'],
		[ 'code' => "NZ", 'phone_code' => "64", 'name' => 'New Zealand'],
		[ 'code' => "NI", 'phone_code' => "505", 'name' => 'Nicaragua'],
		[ 'code' => "NE", 'phone_code' => "227", 'name' => 'Niger'],
		[ 'code' => "NG", 'phone_code' => "234", 'name' => 'Nigeria'],
		[ 'code' => "NU", 'phone_code' => "683", 'name' => 'Niue'],
		[ 'code' => "NF", 'phone_code' => "672", 'name' => 'Norfolk Islands'],
		[ 'code' => "NP", 'phone_code' => "670", 'name' => 'Northern Marianas'],
		[ 'code' => "NO", 'phone_code' => "47", 'name' => 'Norway'],
		[ 'code' => "OM", 'phone_code' => "968", 'name' => 'Oman'],
		[ 'code' => "PW", 'phone_code' => "680", 'name' => 'Palau'],
		[ 'code' => "PA", 'phone_code' => "507", 'name' => 'Panama'],
		[ 'code' => "PG", 'phone_code' => "675", 'name' => 'Papua New Guinea'],
		[ 'code' => "PY", 'phone_code' => "595", 'name' => 'Paraguay'],
		[ 'code' => "PE", 'phone_code' => "51", 'name' => 'Peru'],
		[ 'code' => "PH", 'phone_code' => "63", 'name' => 'Philippines'],
		[ 'code' => "PL", 'phone_code' => "48", 'name' => 'Poland'],
		[ 'code' => "PT", 'phone_code' => "351", 'name' => 'Portugal'],
		[ 'code' => "PR", 'phone_code' => "1787", 'name' => 'Puerto Rico'],
		[ 'code' => "QA", 'phone_code' => "974", 'name' => 'Qatar'],
		[ 'code' => "RE", 'phone_code' => "262", 'name' => 'Reunion'],
		[ 'code' => "RO", 'phone_code' => "40", 'name' => 'Romania'],
		[ 'code' => "RU", 'phone_code' => "7", 'name' => 'Russia'],
		[ 'code' => "RW", 'phone_code' => "250", 'name' => 'Rwanda'],
		[ 'code' => "SM", 'phone_code' => "378", 'name' => 'San Marino'],
		[ 'code' => "ST", 'phone_code' => "239", 'name' => 'Sao Tome &amp; Principe'],
		[ 'code' => "SA", 'phone_code' => "966", 'name' => 'Saudi Arabia'],
		[ 'code' => "SN", 'phone_code' => "221", 'name' => 'Senegal'],
		[ 'code' => "CS", 'phone_code' => "381", 'name' => 'Serbia'],
		[ 'code' => "SC", 'phone_code' => "248", 'name' => 'Seychelles'],
		[ 'code' => "SL", 'phone_code' => "232", 'name' => 'Sierra Leone'],
		[ 'code' => "SG", 'phone_code' => "65", 'name' => 'Singapore'],
		[ 'code' => "SK", 'phone_code' => "421", 'name' => 'Slovak Republic'],
		[ 'code' => "SI", 'phone_code' => "386", 'name' => 'Slovenia'],
		[ 'code' => "SB", 'phone_code' => "677", 'name' => 'Solomon Islands'],
		[ 'code' => "SO", 'phone_code' => "252", 'name' => 'Somalia'],
		[ 'code' => "ZA", 'phone_code' => "27", 'name' => 'South Africa'],
		[ 'code' => "ES", 'phone_code' => "34", 'name' => 'Spain'],
		[ 'code' => "LK", 'phone_code' => "94", 'name' => 'Sri Lanka'],
		[ 'code' => "SH", 'phone_code' => "290", 'name' => 'St. Helena'],
		[ 'code' => "KN", 'phone_code' => "1869", 'name' => 'St. Kitts'],
		[ 'code' => "SC", 'phone_code' => "1758", 'name' => 'St. Lucia'],
		[ 'code' => "SD", 'phone_code' => "249", 'name' => 'Sudan'],
		[ 'code' => "SR", 'phone_code' => "597", 'name' => 'Suriname'],
		[ 'code' => "SZ", 'phone_code' => "268", 'name' => 'Swaziland'],
		[ 'code' => "SE", 'phone_code' => "46", 'name' => 'Sweden'],
		[ 'code' => "CH", 'phone_code' => "41", 'name' => 'Switzerland'],
		[ 'code' => "SI", 'phone_code' => "963", 'name' => 'Syria'],
		[ 'code' => "TW", 'phone_code' => "886", 'name' => 'Taiwan'],
		[ 'code' => "TJ", 'phone_code' => "7", 'name' => 'Tajikstan'],
		[ 'code' => "TH", 'phone_code' => "66", 'name' => 'Thailand'],
		[ 'code' => "TG", 'phone_code' => "228", 'name' => 'Togo'],
		[ 'code' => "TO", 'phone_code' => "676", 'name' => 'Tonga'],
		[ 'code' => "TT", 'phone_code' => "1868", 'name' => 'Trinidad &amp; Tobago'],
		[ 'code' => "TN", 'phone_code' => "216", 'name' => 'Tunisia'],
		[ 'code' => "TR", 'phone_code' => "90", 'name' => 'Turkey'],
		[ 'code' => "TM", 'phone_code' => "7", 'name' => 'Turkmenistan'],
		[ 'code' => "TM", 'phone_code' => "993", 'name' => 'Turkmenistan'],
		[ 'code' => "TC", 'phone_code' => "1649", 'name' => 'Turks &amp; Caicos Islands'],
		[ 'code' => "TV", 'phone_code' => "688", 'name' => 'Tuvalu'],
		[ 'code' => "UG", 'phone_code' => "256", 'name' => 'Uganda'],
		[ 'code' => "GB", 'phone_code' => "44", 'name' => 'UK'],
		[ 'code' => "UA", 'phone_code' => "380", 'name' => 'Ukraine'],
		[ 'code' => "AE", 'phone_code' => "971", 'name' => 'United Arab Emirates'],
		[ 'code' => "UY", 'phone_code' => "598", 'name' => 'Uruguay'],
		[ 'code' => "US", 'phone_code' => "1", 'name' => 'USA'],
		[ 'code' => "UZ", 'phone_code' => "7", 'name' => 'Uzbekistan'],
		[ 'code' => "VU", 'phone_code' => "678", 'name' => 'Vanuatu'],
		[ 'code' => "VA", 'phone_code' => "379", 'name' => 'Vatican City'],
		[ 'code' => "VE", 'phone_code' => "58", 'name' => 'Venezuela'],
		[ 'code' => "VN", 'phone_code' => "84", 'name' => 'Vietnam'],
		[ 'code' => "VG", 'phone_code' => "84", 'name' => 'Virgin Islands - British'],
		[ 'code' => "VI", 'phone_code' => "84", 'name' => 'Virgin Islands - US'],
		[ 'code' => "WF", 'phone_code' => "681", 'name' => 'Wallis &amp; Futuna'],
		[ 'code' => "YE", 'phone_code' => "969", 'name' => 'Yemen North'],
		[ 'code' => "YE", 'phone_code' => "967", 'name' => 'Yemen South'],
		[ 'code' => "ZM", 'phone_code' => "260", 'name' => 'Zambia'],
		[ 'code' => "ZW", 'phone_code' => "263", 'name' => 'Zimbabwe'],
    ];

    public static function getCountryByCode($code){
        foreach(self::$countries as $country){
            if('+'.$country['phone_code'] == $code){
                return $country;
            }
        }
        return null;
    }

    public static function sendTelegramNotification($message, $chatId){
        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot". self::BOT_TOKEN ."/sendMessage?chat_id={$chatId}&parse_mode=html&text={$message}");
    }

    public static function sendTelegramLogs($message, $chatId){
        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot5596158854:AAHKI3PGQa94T5vHJxPgLhuKhXHyWDwGQWA/sendMessage?chat_id={$chatId}&parse_mode=html&text={$message}");
    }

    public static function makeRequest($url, $method, $headers, $data){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);

        $out = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $code = (int)$code;

        $errors = [
        	400 => 'Bad request',
        	401 => 'Unauthorized',
        	403 => 'Forbidden',
        	404 => 'Not found',
        	500 => 'Internal server error',
        	502 => 'Bad gateway',
        	503 => 'Service unavailable',
        ];

        if($code < 200 || $code > 204) {
        	return false;
        }

        $response = json_decode($out, true);

        return $response;
    }

    public static function getRecords($model, $parentId = null){
        switch($model){
			case 'langs': {
				$records = Lang::get();
				break;
			}
            case 'properties': {
                $records = Property::where('status', '!=', Property::STATUS_DRAFT)->get();
                break;
            }
            case 'property-options': {
                $records = new PropertyOption;
                if($parentId){
                    $records = $records->where('property_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
            case 'property-features': {
                $records = new PropertyFeature;
                if($parentId){
                    $records = $records->where('property_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
            case 'directions': {
                $records = Direction::get();
                break;
            }
            case 'direction-options': {
                $records = new DirectionOption;
                if($parentId){
                    $records = $records->where('direction_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
            case 'direction-features': {
                $records = new DirectionFeature;
                if($parentId){
                    $records = $records->where('direction_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
            case 'countries': {
                $records = Country::get();
                break;
            }
            case 'media': {
                $records = Media::get();
                break;
            }
            case 'requests': {
                $records = FormRequest::get();
                break;
            }
            case 'testimonials': {
                $records = Testimonial::get();
                break;
            }
            case 'list-items': {
                $records = new ListItem;
                if($parentId){
                    $records = $records->where('list_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
            case 'articles': {
                $records = BlogArticle::get();
                break;
            }
            case 'article-options': {
                $records = new BlogArticleOption;
                if($parentId){
                    $records = $records->where('blog_article_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
            case 'article-screens': {
                $records = new BlogArticleScreen;
                if($parentId){
                    $records = $records->where('blog_article_id', '=', $parentId);
                }
                $records = $records->get();
                break;
            }
		}

        return $records;
    }

    public static function getFormData($model, $mode, $id = null, $parentId = null){
        $data = [
            'model' => $model,
            'mode' => $mode
        ];

        switch($model){
            case 'langs': {
				$record = new Lang;
                break;
            }
            case 'countries': {
                $record = new Country;
                break;
            }
            case 'directions': {
                $record = new Direction;

                $temp = $record->where('status', '=', Direction::STATUS_DRAFT)->first();
                if(!$temp && !$id){
                    $record = new Direction;
                    $record->save();
                }

                $data['countries'] = Country::get();
                break;
            }
            case 'direction-options': {
                $record = new DirectionOption;
                if($parentId && $mode == 'add'){
                    $record->direction_id = $parentId;
                }
                break;
            }
            case 'direction-features': {
                $record = new DirectionFeature;
                if($parentId && $mode == 'add'){
                    $record->direction_id = $parentId;
                }
                break;
            }
            case 'properties': {
                $record = new Property;

                if($mode == 'add'){
                    $temp = $record->where('status', '=', Property::STATUS_DRAFT)->first();
                    if(!$temp && !$id){
                        $record = new Property;
                        $record->save();
                    }else{
                        if($temp && !$id){
                            $record = $temp;
                        }
                    }
                }

                $data['directions'] = Direction::get();
                break;
            }
            case 'property-options': {
                $record = new PropertyOption;
                if($parentId && $mode == 'add'){
                    $record->property_id = $parentId;
                }
                break;
            }
            case 'property-features': {
                $record = new PropertyFeature;
                if($parentId && $mode == 'add'){
                    $record->property_id = $parentId;
                }
                break;
            }
            case 'media': {
                $record = new Media;
                break;
            }
            case 'requests': {
                $record = new FormRequest;
                break;
            }
            case 'testimonials': {
                $record = new Testimonial;
                break;
            }
            case 'list-items': {
                $record = new ListItem;
                if($parentId && $mode == 'add'){
                    $record->list_id = $parentId;
                }
                break;
            }
            case 'articles': {
                $record = new BlogArticle;

                $temp = $record->where('status', '=', BlogArticle::STATUS_DRAFT)->first();
                if(!$temp && !$id){
                    $record = new BlogArticle;
                    $record->save();
                }
                break;
            }
            case 'article-options': {
                $record = new BlogArticleOption;
                if($parentId && $mode == 'add'){
                    $record->blog_article_id = $parentId;
                }
                break;
            }
            case 'article-screens': {
                $record = new BlogArticleScreen;
                if($parentId && $mode == 'add'){
                    $record->blog_article_id = $parentId;
                }
                break;
            }

        }

        if($mode != 'add'){
            $record = $record::find($id);

            if($mode == 'delete'){
                $data['form'] = ['text' => 'Are you sure to delete this record?'];
            }
        }

        $data['record'] = $record;

        return $data;
    }

    public static function proccessFormData($model, $params){
        $parentId = null;
        unset($params['_token']);
        $rules = [];
        $id = isset($params['id']) ? $params['id'] : null;

        $langs = Lang::getActive(true);

        switch($model){
            case 'langs' :{
                $recordModel = new Lang;
                $rules = [
                    'title' => ['required']
                ];
                if(!$id){
                    $rules['code'] = ['required', 'unique:langs'];
                }else{
                    $rules['code'] = ['required'];
                }

                $fillParams = $params;

                break;
            }
            case 'countries' :{
                $recordModel = new Country;

                $fillParams = [];

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                }
                break;
            }
            case 'directions' :{
                $recordModel = new Direction;

                $fillParams = $params;

                $rules = [
                    'url' => ['required'],
                    'preview_image_id' => ['required'],
                    'page_banner_id' => ['required']
                ];

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                    $rules['description_'.$langId] = ['required'];
                }
                break;
            }
            case 'direction-options' :{
                $recordModel = new DirectionOption;

                $fillParams = $params;

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                    $rules['description_'.$langId] = ['required'];
                }
                break;
            }
            case 'direction-features':{
                $recordModel = new DirectionFeature;

                $fillParams = $params;
                $type = $params['type'];

                if($type == 'photo' || $type == 'combined'){
                    $rules['media_id'] = ['required'];
                }
                foreach($langs as $key=>$langId){
                    if($type == 'text'){
                        $rules['title_'.$langId] = ['required'];
                    }

                    if($type == 'combined' || $type == 'offer'){
                        $rules['text_'.$langId] = ['required'];
                    }
                }
                break;
            }
            case 'properties' :{
                $recordModel = new Property;

                $fillParams = $params;

                $rules = [
                    'url' => ['required'],
                    'price' => ['required'],
                    'preview_image_id' => ['required']
                ];

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                    $rules['type_'.$langId] = ['required'];
                    $rules['location_full_'.$langId] = ['required'];
                }
                break;
            }
            case 'property-options' :{
                $recordModel = new PropertyOption;

                $fillParams = $params;

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                    $rules['description_'.$langId] = ['required'];
                }
                break;
            }
            case 'property-features':{
                $recordModel = new PropertyFeature;

                $fillParams = $params;
                $type = $params['type'];

                if($type == 'photo' || $type == 'combined'){
                    $rules['media_id'] = ['required'];
                }
                foreach($langs as $key=>$langId){
                    if($type == 'text'){
                        $rules['title_'.$langId] = ['required'];
                    }

                    if($type == 'combined' || $type == 'offer'){
                        $rules['text_'.$langId] = ['required'];
                    }
                }
                break;
            }
            case 'testimonials' :{
                $recordModel = new Testimonial;

                $fillParams = $params;

                foreach($langs as $key=>$langId){
                    $rules['author_'.$langId] = ['required'];
                    $rules['text_'.$langId] = ['required'];
                }
                break;
            }
            case 'list-items' :{
                $recordModel = new ListItem;

                if(!isset($params['list_id'])){
                    $newList = new CustomList;
                    $newList->save();

                    $params['list_id'] = $newList->id;
                }
                $fillParams = $params;

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                }
                break;
            }
            case 'articles' :{
                $recordModel = new BlogArticle;

                $fillParams = $params;

                $rules = [
                    'url' => ['required'],
                    'page_banner_id' => ['required']
                ];

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                    $rules['description_'.$langId] = ['required'];
                }
                break;
            }
            case 'article-options' :{
                $recordModel = new BlogArticleOption;

                $fillParams = $params;

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                    $rules['description_'.$langId] = ['required'];
                }
                break;
            }
            case 'article-screens':{
                $recordModel = new BlogArticleScreen;

                $fillParams = $params;

                $rules['media_id'] = ['required'];

                foreach($langs as $key=>$langId){
                    $rules['title_'.$langId] = ['required'];
                }
                break;
            }
            /*case 'admins' :{
                $recordModel = new Admin;
                $rules = [
                    'name' => ['required'],
                ];
                if(!$id){
                    $rules['password'] = ['required'];
                    $rules['login'] = ['required', 'unique:admins'];
                }else{
                    $rules['login'] = ['required'];
                }
                break;
            }*/
        }

        $validator = Validator::make($params, $rules);

        if(!$validator->fails()) {
            if($id){
                $record = $recordModel::find($id);
                $mode = 'edit';

                /*if($model == 'admins'){
                    $params['active'] = $request->active ? 1 : 0;
                    if(!$params['password']){
                        $params['password'] = $record->password;
                    }else{
                        $params['password'] = Hash::make($params['password']);
                    }
                }*/
            }else{
                $record = new $recordModel;
                $mode = 'add';

                /*if($model == 'admins'){
                    $params['password'] = Hash::make($params['password']);
                }*/
            }

            if(count($fillParams)){
                $record->fill($params)->save();
            }else{
                $record->save();
            }

            $fields = [];

            switch($model){
                case 'countries':{
                    $translateModel = new CountryTranslate;
                    $recordIdField = 'country_id';
                    $fields = [
                        'title'
                    ];
                    break;
                }
                case 'directions':{
                    $translateModel = new DirectionTranslate;
                    $recordIdField = 'direction_id';
                    $fields = [
                        'title',
                        'description',
                        'page_label',
                        'page_description'
                    ];
                    break;
                }
                case 'direction-options':{
                    $translateModel = new DirectionOptionTranslate;
                    $recordIdField = 'direction_option_id';
                    $fields = [
                        'title',
                        'description'
                    ];
                    $parentId = $record->direction_id;
                    break;
                }
                case 'direction-features':{
                    $translateModel = new DirectionFeatureTranslate;
                    $recordIdField = 'direction_feature_id';

                    if($type != 'photo'){
                        $fields[] = 'description';
                    }

                    if($type == 'text'){
                        $fields[] = 'title';
                    }

                    if($type == 'combined' || $type == 'offer'){
                        $fields[] = 'text';
                    }

                    $parentId = $record->direction_id;
                    break;
                }
                case 'properties':{
                    $translateModel = new PropertyTranslate;
                    $recordIdField = 'property_id';
                    $fields = [
                        'title',
                        'type',
                        'location_full',
                        'payment_plan',
                        'completion_date',
                        'rent_out',
                        'buy_out',
                        'offer',
                        'payback',
                        'page_label',
                        'page_description'
                    ];
                    break;
                }
                case 'property-options':{
                    $translateModel = new PropertyOptionTranslate;
                    $recordIdField = 'property_option_id';
                    $fields = [
                        'title',
                        'description'
                    ];
                    $parentId = $record->property_id;
                    break;
                }
                case 'property-features':{
                    $translateModel = new PropertyFeatureTranslate;
                    $recordIdField = 'property_feature_id';

                    if($type != 'photo'){
                        $fields[] = 'description';
                    }

                    if($type == 'text'){
                        $fields[] = 'title';
                    }

                    if($type == 'combined' || $type == 'offer'){
                        $fields[] = 'text';
                    }

                    $parentId = $record->property_id;
                    break;
                }
                case 'testimonials':{
                    $translateModel = new TestimonialTranslate;
                    $recordIdField = 'testimonial_id';
                    $fields = [
                        'text',
                        'author'
                    ];
                    break;
                }
                case 'list-items':{
                    $translateModel = new ListItemTranslate;
                    $recordIdField = 'list_item_id';
                    $fields = [
                        'title'
                    ];
                    $parentId = $record->list_id;
                    break;
                }
                case 'articles':{
                    $translateModel = new BlogArticleTranslate;
                    $recordIdField = 'blog_article_id';
                    $fields = [
                        'title',
                        'description',
                        'page_title',
                        'page_description',
                        'page_options_title'
                    ];
                    break;
                }
                case 'article-options':{
                    $translateModel = new BlogArticleOptionTranslate;
                    $recordIdField = 'blog_article_option_id';
                    $fields = [
                        'title',
                        'description'
                    ];
                    $parentId = $record->blog_article_id;
                    break;
                }
                case 'article-screens':{
                    $translateModel = new BlogArticleScreenTranslate;
                    $recordIdField = 'blog_article_screen_id';

                    $fields = [
                        'title',
                        'heading',
                        'description'
                    ];

                    $parentId = $record->blog_article_id;
                    break;
                }
            }

            if(count($fields)){
                if(isset($translateModel)){
                    foreach($langs as $key=>$langId){
                        if(!$translate = $translateModel->where($recordIdField, '=', $record->id)->where('lang_id', '=', $langId)->first()){
                            $translate = new $translateModel;
                        }

                        $translate->$recordIdField = $record->id;
                        $translate->lang_id = $langId;
                        foreach($fields as $field){
                            $postField = $field.'_'.$langId;
                            $value = $params[$postField];
                            $translate->$field = $value;
                        }
                        $translate->save();
                    }
                }
            }

            return [
                'success' => true,
                'data' => [
                    'id' => $id,
                    'model' => $model,
                    'mode' => $mode,
                    'parentId' => $parentId
                ]
            ];
        }
        else{
            return [
                'success' => false,
                'data' => [
                    'errors' => $validator->errors()
                ]
            ];
		}
    }

    public static function deleteRecord($model, $id){
        switch($model){
            case 'langs': {
                $modelRecord = Lang::find($id);
                break;
            }
            case 'countries': {
                $modelRecord = Country::find($id);
                break;
            }
            case 'directions': {
                $modelRecord = Direction::find($id);
                break;
            }
            case 'direction-options': {
                $modelRecord = DirectionOption::find($id);
                break;
            }
            case 'direction-features': {
                $modelRecord = DirectionFeature::find($id);
                break;
            }
            case 'properties': {
                $modelRecord = Property::find($id);
                break;
            }
            case 'property-options': {
                $modelRecord = PropertyOption::find($id);
                break;
            }
            case 'property-features': {
                $modelRecord = PropertyFeature::find($id);
                break;
            }
            case 'media': {
                $modelRecord = Media::find($id);
                break;
            }
            case 'testimonials': {
                $modelRecord = Testimonial::find($id);
                break;
            }
            case 'list-items': {
                $modelRecord = ListItem::find($id);
                break;
            }
            case 'articles': {
                $modelRecord = BlogArticle::find($id);
                break;
            }
            case 'article-options': {
                $modelRecord = BlogArticleOption::find($id);
                break;
            }
            case 'article-screens': {
                $modelRecord = BlogArticleScreen::find($id);
                break;
            }
        }

        if($modelRecord){
            if($modelRecord->deleteAllData()){
                return [
                    'success' => true,
                    'data' => [
                        'id' => $id,
                        'mode' => 'delete'
                    ]
                ];
            }
        }
        return true;
    }

    public static function getStats(){
        $propertiesCount = Property::where('status', '!=', BlogArticle::STATUS_DRAFT)->count();
        $directionsCount = Direction::where('status', '!=', BlogArticle::STATUS_DRAFT)->count();
        $articlesCount = BlogArticle::where('status', '!=', BlogArticle::STATUS_DRAFT)->count();

        $formRequests = FormRequest::orderBy('created_at', 'DESC')->get();

        $stats = [
            'properties' => [
                'count' => $propertiesCount,
                'image' => null
            ],
            'directions' => [
                'count' => $directionsCount,
                'image' => null
            ],
            'articles' => [
                'count' => $articlesCount,
                'image' => null
            ],
            'formRequests' => [
                'list' => $formRequests
            ]
        ];

        if($propertiesCount){
            $stats['properties']['image'] = Property::where('status', '!=', BlogArticle::STATUS_DRAFT)->inRandomOrder()->first()->previewImage();
        }
        if($directionsCount){
            $stats['directions']['image'] = Direction::where('status', '!=', BlogArticle::STATUS_DRAFT)->inRandomOrder()->first()->previewImage();
        }
        if($articlesCount){
            $stats['articles']['image'] = BlogArticle::where('status', '!=', BlogArticle::STATUS_DRAFT)->inRandomOrder()->first()->bannerImage();
        }

        if(count($formRequests)){
            $stats['formRequests']['new'] = FormRequest::getNew();
        }

        return $stats;
    }

}
