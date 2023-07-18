<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    const STATUS_DRAFT = -1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'url',
        'country_id',
        'preview_image_id',
        'page_banner_id',
        'status',
    ];

    public function translate($langId){
        $directionTranslate = DirectionTranslate::where('direction_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($directionTranslate){
            return $directionTranslate;
        }
        return new DirectionTranslate;
    }

    public function country($langId){
        $countryId = $this->country_id;
        $countryTranslate = CountryTranslate::where('country_id', '=', $countryId)->where('lang_id', '=', $langId)->first();

        if($countryTranslate){
            return $countryTranslate->title;
        }
        return null;
    }

    public function options(){
        return $this->hasMany('App\Models\DirectionOption', 'direction_id');
    }
    public function features(){
        return $this->hasMany('App\Models\DirectionFeature', 'direction_id');
    }

    public function previewImage(){
        $path = public_path('/media');
        $photo = Media::find($this->preview_image_id);
        if($photo){
            if(file_exists($path.'/'.$photo->filename)){
                return $photo->filename();
            }
        }
        return null;
    }
    public function bannerImage(){
        $path = public_path('/media');
        $photo = Media::find($this->page_banner_id);
        if($photo){
            if(file_exists($path.'/'.$photo->filename)){
                return $photo->filename();
            }
        }
        return null;
    }

    public function deleteAllData(){
        $id = $this->id;
        if($this->delete()){
            DirectionTranslate::where('direction_id', '=', $id)->delete();
            $options = $this->options;
            if($options){
                foreach ($options as $option) {
                    $option->deleteAllData();
                }
            }
            $features = $this->features;
            if($features){
                foreach ($features as $feature) {
                    $feature->deleteAllData();
                }
            }

            return true;
        }
        return false;
    }

    public function isPublished(){
        return $this->status == self::STATUS_ACTIVE;
    }

    public function isDisabled(){
        return $this->status == self::STATUS_DISABLED;
    }

    public function isDraft(){
        return $this->status == self::STATUS_DRAFT;
    }

    public static $directions = [
        'dubai' => [
            'title' => 'UAE<br>(Dubai)',
            'description' => 'Welcome to <u>DUBAI</u>',
            'image' => '/images/directions/dubai/preview.jpg',
            'page' => [
                'banner_image' => '/images/directions/dubai/banner.jpg',
                'label' => 'One of the most sought-after and prestigious direction in the world',
                'description' => 'Investment in Dubai real estate can start from $200,000, with an average ticket size of $1 million. The main advantage is the safety and calm political environment, which guarantees the safety of your investments.',
                'options' => [
                    [
                        'title' => 'Safety&Pleasure',
                        'description' => "It's a place where the global business elite gathers, where a strong international business community is combined with a secure political environment and progressive infrastructure."
                    ],
                    [
                        'title' => 'Growth Prospects',
                        'description' => 'The city attracts a large flow of tourists, expats, and investors, and it continues to grow and develop, with a promising plan up to 2040.'
                    ]
                ],
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Real estate in Dubai is one of the best assets for investment. The growth in property prices is at least 10-15% per year, guaranteeing high profits for your investments.',
                        'description' => 'Another advantage is the possibility of selling the property at an increased price during the construction phase, with the opportunity to earn up to 50% return on investment.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/directions/dubai/feature1.jpg',
                        'text' => 'There is an opportunity to obtain a residency visa and a gold visa for purchasing property starting from $205,000',
                        'description' => 'The ROI is 7-10%'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/directions/dubai/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => 'Owning property in Dubai allows you to earn income from short-term and long-term rentals, significantly increasing your profits. Additionally, you can benefit from post-sale services and remote property purchases.'
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/directions/dubai/feature3.jpg'
                    ]
                ]
            ]

        ],
        'miami' => [
            'title' => 'USA<br>(Miami)',
            'description' => 'Welcome to <u>MIAMI</u>',
            'image' => '/images/directions/miami/preview.jpg',
            'page' => [
                'banner_image' => '/images/directions/miami/banner.jpg',
                'label' => 'The place where dreams of stable and profitable investments come true',
                'description' => 'With an annual rental occupancy rate of over 85% and a growing demand for short-term rentals, Miami is one of the most sought-after real estate markets in the world.',
                'options' => [
                    [
                        'title' => 'Popularity',
                        'description' => "A top-notch location with a worldwide reputation."
                    ],
                    [
                        'title' => 'Unicity',
                        'description' => 'Limited offerings and scarce lands only increase the value of investments.'
                    ],
                    [
                        'title' => 'Benefit',
                        'description' => 'The high rental costs and the possibility of reselling properties with the exclusion of high taxation for foreigners.'
                    ]
                ],
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Investing in accredited properties in Miami is an excellent option if you are looking for an opportunity to obtain a Green Card.',
                        'description' => 'The high return on investment associated with the increase in property prices based on demand, rather than market saturation, makes this choice even more attractive.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/directions/miami/feature1.jpg',
                        'text' => 'Miami is a place where investors can realize their dreams and achieve financial stability.'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/directions/miami/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "One of the state's and the world’s – most popular vacation spots. Though destinations often are said to offer something for everyone, the Miami area does indeed offer multiple enticements for all."
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/directions/miami/feature3.jpg'
                    ]
                ]
            ]
        ],
        'bali' => [
            'title' => 'INDONESIA<br>(Bali)',
            'description' => 'Welcome to <u>BALI</u>',
            'image' => '/images/directions/bali/preview.jpg',
            'page' => [
                'banner_image' => '/images/directions/bali/banner.jpg',
                'label' => 'One of the most popular tourist destinations in the world',
                'description' => 'On Bali, you will find high returns on real estate investments, thanks to the 300% increase in land value over the last 5 years.',
                'options' => [
                    [
                        'title' => 'Environment',
                        'description' => "Low taxes and a peaceful political situation, it is an excellent option for both short-term and long-term investments."
                    ],
                    [
                        'title' => 'Low investment',
                        'description' => 'The average investment amount for Bali is $250,000, but the starting investment amount can be as low as $150,000.'
                    ],
                    [
                        'title' => 'Different Options',
                        'description' => 'Short-term and long-term rentals are possible, without the need to worry about seasonality.'
                    ],
                ],
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Investing in Bali provides an opportunity to receive passive income and be confident in the safety of your investments thanks to the management company, which provides full control and monitoring of real estate on Bali.',
                        'description' => "We also provide remote real estate purchasing to make the investment process in Bali as convenient and easy as possible. You don't need to come to the island to buy real estate and earn income."
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/directions/bali/feature1.jpg',
                        'text' => 'Investing in Bali promises an ROI of 12% to 25% and a payback period of 5-6 years.',
                        'description' => 'The ROI ranges from 8% to 12%'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/directions/bali/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => 'You can entrust the management of your investments to our company, which will provide full service and care for all matters related to your Bali property.<br>Whether you are looking for short-term or long-term investments, investing in real estate on Bali is a wise decision.'
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/directions/bali/feature3.jpg'
                    ]
                ]
            ]
        ],
        'mexico' => [
            'title' => 'MEXICO<br>(Riviera Maya)',
            'description' => 'Welcome to <u>MEXICO</u>',
            'image' => '/images/directions/mexico/preview.jpg',
            'page' => [
                'banner_image' => '/images/directions/mexico/banner.jpg',
                'label' => 'An excellent option for investors seeking high returns in a beautiful location',
                'description' => 'The real estate market on the Mexican Riviera is  attractive for many reasons, including year-round sunny climate, stunning beaches, crystal-clear water, and beautiful nature.',
                'options' => [
                    [
                        'title' => 'Top location',
                        'description' => "Puerto Aventuras is a small resort town on the coast of the Caribbean Sea with a perfect location."
                    ],
                    [
                        'title' => 'Reselling',
                        'description' => 'The real estate market on the Mexican Riviera provides high investment returns, with starting prices at just $200,000 and average prices at $500,000. '
                    ],
                    [
                        'title' => 'High return',
                        'description' => 'The shortage of land in this village will lead to the cost of land steadily increasing. Analysts promise a return on investments from 10% to 15%.'
                    ]
                ],
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Moreover, the Mexican Riviera has low taxes and a peaceful political climate, making it even more attractive for investors.',
                        'description' => 'You can also purchase land for construction and invest in remote real estate purchases.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/directions/mexico/feature1.jpg',
                        'text' => 'This area is growing steadily, attracting numerous investors and tourists each year',
                        'description' => 'The ROI ranges from 8% to 12%'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/directions/mexico/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => 'An important advantage of investing in real estate on the Mexican Riviera is the ability to pay and receive income in cryptocurrency, a great way to diversify your portfolio and earn profits from cryptocurrency growth.'
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/directions/mexico/feature3.jpg'
                    ]
                ]
            ]
        ]
    ];

    public static function getAll(){
        $directions = self::$directions;

        return $directions;
    }

    public static function getByKey($key){
        $directions = self::$directions;
        if(isset($directions[$key])){
            return $directions[$key];
        }
        return null;
    }

}
