<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public static $properties = [
        'district-11-opal-gardens' => [
            'location' => 'dubai',
            'title' => 'District 11 Opal Gardens',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai, Meydan',
            'type' => 'Townhouse, 4 bedroom',
            'price' => 'from 1 170 800$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => 'Q3 2026',
            'payment_plan' => '-',
            'image' => 'im_district_11.jpg',
            'mode' => 'invest',
            'price_digit' => 1170800
        ],
        'cielo-maya' => [
            'location' => 'mexico',
            'title' => 'Cielo Maya',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 3 bedroom',
            'price' => 'from 1 435 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q3 2024',
            'payment_plan' => 'Different Options',
            'image' => 'im_cielo_maya.jpg',
            'mode' => 'more',
            'price_digit' => 1435000
        ],
        'cipriani-residences' => [
            'location' => 'miami',
            'title' => 'CIPRIANI Residences',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami',
            'type' => 'Apartmnet, 1 bedroom',
            'price' => 'from 2 341 900$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => '-',
            'payment_plan' => '-',
            'image' => 'im_cipriani.jpg',
            'mode' => 'more',
            'price_digit' => 2341900
        ],
        'waldorf-astoria' => [
            'location' => 'miami',
            'title' => 'Waldorf Astoria',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Downtown',
            'type' => 'Apartmnet, 3 bedroom',
            'price' => 'from 3 942 000$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => '-',
            'payment_plan' => '-',
            'image' => 'im_waldorf_astoria.jpg',
            'mode' => 'invest',
            'price_digit' => 3942000
        ],
        'bloom' => [
            'location' => 'mexico',
            'title' => 'Bloom',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 639 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q2 April 2025',
            'payment_plan' => 'Down Payment 30%',
            'image' => 'im_bloom.jpg',
            'mode' => 'more',
            'price_digit' => 639000
        ],
        'bentley-residences' => [
            'location' => 'miami',
            'title' => 'Bentley Residences',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Sunny Isles Beach',
            'type' => 'Apartmnet',
            'price' => 'from 5 600 000$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => '2027',
            'payment_plan' => '-',
            'image' => 'im_bentley_residence.jpg',
            'mode' => 'more',
            'price_digit' => 5600000
        ],
        'nalu-luxury-residences' => [
            'location' => 'mexico',
            'title' => 'NALU Luxury Beachfront Residences',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Morelos',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 600 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q1 2023',
            'payment_plan' => 'Different Options',
            'image' => 'im_nalu_residences.jpg',
            'mode' => 'more',
            'price_digit' => 600000
        ],
        'damac-bay-cavalli' => [
            'location' => 'dubai',
            'title' => 'Damac Bay by Cavalli',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai Marina - Dubai Harbour',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 814 200$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => '2027',
            'payment_plan' => '-',
            'image' => 'im_damac_bay.jpg',
            'mode' => 'invest',
            'price_digit' => 814200
        ],
        'grand-peninsula' => [
            'location' => 'mexico',
            'title' => 'Grand Peninsula',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 3 bedroom',
            'price' => 'from 779 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => '2025',
            'payment_plan' => 'Down Payment 30%',
            'image' => 'im_grand_peninsula.jpg',
            'mode' => 'more',
            'price_digit' => 779000
        ],
        'nexo-residences' => [
            'location' => 'miami',
            'title' => 'NEXO Residences',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'North Miami Beach, Florida',
            'type' => 'Residence Units',
            'price' => 'from 505 000$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => '2025',
            'offer' => 'EB 5 program — you can get green card for the investment in this project',
            'image' => 'im_nexo_residences.jpg',
            'mode' => 'more',
            'price_digit' => 505000
        ],
        'west-eleventh' => [
            'location' => 'miami',
            'title' => 'West Eleventh',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Downtown',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 511 000$',
            'for' => 'For living / For re-sale / For long term rent',
            'completion_date' => '2025',
            'payment_plan' => '-',
            'image' => 'im_west_eleventh.jpg',
            'mode' => 'invest',
            'price_digit' => 511000
        ],
        'secret-waters' => [
            'location' => 'mexico',
            'title' => 'Secret Waters',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 421 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q4 2023',
            'payment_plan' => 'Down Payment 30%',
            'image' => 'im_secret_waters.jpg',
            'mode' => 'more',
            'price_digit' => 421000
        ],
        'nunna' => [
            'location' => 'mexico',
            'title' => 'Nunna',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 450 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q4 2023',
            'payment_plan' => '-',
            'image' => 'im_nunna.jpg',
            'mode' => 'more',
            'price_digit' => 450000
        ],
        '600-wordcenter' => [
            'location' => 'miami',
            'title' => '600 Worldcenter',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Downtown',
            'type' => 'Apartment, Studio',
            'price' => 'from 435 000$',
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => '2026',
            'payment_plan' => '-',
            'image' => 'im_600_worldcenter.jpg',
            'mode' => 'invest',
            'price_digit' => 435000
        ],
        'upper-house' => [
            'location' => 'dubai',
            'title' => 'Upper House',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai, JLT',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 336 600$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q1 2026',
            'payment_plan' => '-',
            'image' => 'im_upper_house.jpg',
            'mode' => 'invest',
            'price_digit' => 336600
        ],
        'ceiba-condo-paradise' => [
            'location' => 'mexico',
            'title' => 'Ceiba 25 Condo Paradise',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Playa del Carmen',
            'type' => [
                    'Apartment, 1 bedroom',
                    'Penthouses, 1 bedroom'
                ],
            'price' => 'from 357 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => '-',
            'payment_plan' => '-',
            'image' => 'im_ceiba_paradise.jpg',
            'mode' => 'more',
            'price_digit' => 357000
        ],
        'the-edge' => [
            'location' => 'dubai',
            'title' => 'The Edge',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai, Business Bay',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 350 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => 'Q4 2026',
            'payment_plan' => '-',
            'image' => 'im_edge.jpg',
            'mode' => 'invest',
            'price_digit' => 350000
        ],
        'cuddles-berawa' => [
            'location' => 'bali',
            'title' => 'Cuddles Berawa Project',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Berawa',
            'type' => 'Villa, two options',
            'price' => [
                '250 000$ for 1 bedroom',
                '320 000$ for 2 bedroom'
            ],
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => 'Q1 2024',
            'rent_out' => '12% - 17.85% ROI',
            'buy_out' => '100-130% after development',
            'payback' => '5-6 years',
            'image' => 'im_cuddles_berawa.jpg',
            'mode' => 'invest',
            'price_digit' => [250000, 320000]
        ],
        /*'batu-bolong' => [
            'location' => 'bali',
            'title' => 'Batu Bolong',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Berawa',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 180 000$',
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => 'Q2 2024',
            'rent_out' => '12% ROI',
            'buy_out' => '100-130% after development',
            'payback' => '5-6 years',
            'image' => 'im_batu_bolong.jpg',
        ],*/
        'umalas-premier' => [
            'location' => 'bali',
            'title' => 'Umalas Premier Project',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Umalas',
            'type' => 'Townhouse, 2 bedroom',
            'price' => '260 000$',
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => 'Q3 2023',
            'rent_out' => '16 - 23% ROI',
            'buy_out' => '100-130% after development',
            'payback' => '5-6 years',
            'image' => 'im_umalas_premier.jpg',
            'mode' => 'invest',
            'price_digit' => 260000
        ],
        'sunny-apart-1' => [
            'location' => 'bali',
            'title' => 'Sunny Apart 1',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 180 000$',
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => 'Q1 2024',
            'rent_out' => '9,8 - 20,6% ROI',
            'buy_out' => '100-130% after development',
            'payback' => '5-6 years',
            'image' => 'im_sunny_apart_1.jpg',
            'mode' => 'invest',
            'price_digit' => 180000
        ],
        'sunny-apart-2' => [
            'location' => 'bali',
            'title' => 'Sunny Apart 2',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Berawa',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 180 000$',
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => 'Q2 2024',
            'rent_out' => '12% ROI',
            'buy_out' => '100-130% after development',
            'payback' => '5-6 years',
            'image' => 'im_sunny_apart_2.jpg',
            'mode' => 'invest',
            'price_digit' => 180000
        ],
        'batu-bolong-2' => [
            'location' => 'bali',
            'title' => 'Batu Bolong Project',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Batu Bolong',
            'type' => 'Townhouse, 2 bedroom',
            'price' => '350 000$',
            'for' => 'For living / For re-sale / For short term rent',
            'completion_date' => 'Q2 2023',
            'rent_out' => '14,5 - 20,5% ROI',
            'buy_out' => '100-130% after development',
            'payback' => '5-6 years',
            'image' => 'im_batu_bolong_2.jpg',
            'mode' => 'invest',
            'price_digit' => 350000
        ],
        'sea-heaven' => [
            'location' => 'dubai',
            'title' => 'SeaHeaven',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai Marina - Dubai Harbour',
            'type' => 'Apartment, 3 bedroom',
            'price' => 'from 2 180 000$',
            'for' => 'For living / For re-sale / For daily rent',
            'completion_date' => '2026',
            'payment_plan' => '-',
            'image' => 'im_sea_heaven.jpg',
            'mode' => 'invest',
            'price_digit' => 2180000
        ]
    ];

    public static function getAll($location, $options){
        if($location == 'all'){
            $properties = self::$properties;
        }else{
            $properties = self::getPropertiesByLocation($location);
        }
        if(isset($options['price'])){
            $propertiesByPrice = [];
            foreach($properties as $url=>$property){
                if($property['price_digit'] <= $options['price']){
                    $propertiesByPrice[$url] = $property;
                }
            }
            $properties = $propertiesByPrice;
        }
        return $properties;
    }

    private static function getPropertiesByLocation($location){
        if(in_array($location, ['bali', 'miami', 'dubai', 'mexico'])){
            foreach(self::$properties as $url=>$property){
                if($property['location'] == $location){
                    $result[$url] = $property;
                }
            }
            return $result;
        }
        return [];
    }

    public static function getByKey($key){
        $properties = self::$properties;
        if(isset($properties[$key])){
            return $properties[$key];
        }
        return null;
    }

}
