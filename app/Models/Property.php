<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const STATUS_DRAFT = -1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'direction_id',
        'url',
        'price',
        'square',
        'price_per_square',
        'for_living',
        'for_resale',
        'for_long_rent',
        'for_daily_rent',
        'preview_image_id',
        'page_banner_id',
        'status',
        'on_main'
    ];

    public function translate($langId){
        $propertyTranslate = PropertyTranslate::where('property_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($propertyTranslate){
            return $propertyTranslate;
        }
        return new PropertyTranslate;
    }

    public function direction($langId){
        $directionTranslate = DirectionTranslate::where('direction_id', '=', $this->direction_id)->where('lang_id', '=', $langId)->first();

        if($directionTranslate){
            return $directionTranslate->title;
        }
        return null;
    }

    public function options(){
        return $this->hasMany('App\Models\PropertyOption', 'property_id');
    }
    public function features(){
        return $this->hasMany('App\Models\PropertyFeature', 'property_id');
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
            PropertyTranslate::where('property_id', '=', $id)->delete();
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

    public static $properties = [
        'district-11-opal-gardens' => [
            'location' => 'dubai',
            'title' => 'District 11 Opal Gardens',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai, Meydan',
            'type' => 'Townhouse, 4 bedroom',
            'price' => 'from 1 170 800$',
            'for' => 'For living / For resale / For long term rental',
            'completion_date' => 'Q3 2026',
            'payment_plan' => '+',
            'image' => '/images/projects/district-11-opal-gardens/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 1170800,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/district-11-opal-gardens/banner.jpg',
                'label' => 'A lifestyle designed to ingulde',
                'description' => 'Opal Gardens is the newest high–end community taking residence in Dubai’s most affluent address – District 11 in MBR City',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'The main feature of the luxurious villa and townhouse community is the Crystal Lagoon. Residents of the development will enjoy luxurious amenities such as the East Lagoon, sandy beaches, commercial facilities, an amenity lawn and sikka.',
                        'description' => 'The sprawling lawn features a children’s playground, an outdoor fitness center and sports court, a yoga platform, and shaded seating and picnic areas. The community also offers all the necessary facilities such as retail, a mosque, schools, clinics and a supermarket.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/district-11-opal-gardens/feature1.jpg',
                        'text' => 'District 11 – Opal Gardens enlivens the spirit with verdant green spaces encircling a stunning crystal lagoon'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/district-11-opal-gardens/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => 'What concepts do we cover',
                        'list' => [
                            'The development is secure and gated',
                            'The elegant homes will be surrounded by luscious landscaping and 16,404-ft long cycling and pedestrian trails',
                            'East Lagoon, sandy beaches, commercial facilities',
                            'Fitness center, sports court, a yoga platform'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/district-11-opal-gardens/feature3.jpg'
                    ]
                ]
            ]

        ],
        'cielo-maya' => [
            'location' => 'mexico',
            'title' => 'Cielo Maya',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 3 bedroom',
            'price' => 'from 1 435 000$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q3 2024',
            'payment_plan' => 'Different Options',
            'image' => '/images/projects/cielo-maya/preview.jpg',
            'mode' => 'more',
            'price_digit' => 1435000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/cielo-maya/banner.jpg',
                'label' => 'Large area of objects',
                'description' => 'The Cielo Maya residential complex location is on the beachfront, with access to its coast',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'The complex includes tree and four-bedroom flats, 3.5 bathrooms, a fully equipped kitchen, a terrace overlooking the beach and the sea, a living room, and luxury finishes.',
                        'description' => '8 flats ranging in size from 302 m2 to 347 m2.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/cielo-maya/feature1.jpg',
                        'text' => 'Fall in love with Puerto Morelos’ magic and unique lifestyle'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/cielo-maya/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => 'The land area is 7000 sq.m.',
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/cielo-maya/feature3.jpg'
                    ]
                ]
            ]
        ],
        'cipriani-residences' => [
            'location' => 'miami',
            'title' => 'CIPRIANI Residences',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami',
            'type' => 'Apartmnet, 1 bedroom',
            'price' => 'from 2 341 900$',
            'for' => 'For living / For resale / For long term rental',
            'completion_date' => '2027',
            'payment_plan' => '+',
            'image' => '/images/projects/cipriani-residences/preview.jpg',
            'mode' => 'more',
            'price_digit' => 2341900,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/cipriani-residences/banner.jpg',
                'label' => 'A modern lifestyle',
                'description' => 'Cipriani Residences Miami continues its storied tradition with residences true to its convivial, stylish spirit',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Positioned in a privileged location at the gateway to the vibrant Miami neighborhood of Brickell, Cipriani Residences Miami epitomizes the timeless Italian spirit, style, and service for which the brand does so revered.',
                        'description' => "Residents will enjoy a life of effortless elegance and convenient access to this exciting metropolis's wealth of experiences."
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/cipriani-residences/feature1.jpg',
                        'text' => '“We are bringing the essence and spirit of cipriani into the interiors”',
                        'description' => 'Leo Bertacchini, 1508 interior design'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/cipriani-residences/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => 'Residence Features',
                        'list' => [
                            'Residents have exclusive access to around-the-clock dining services by Cipriani, available both in-home and in private, reservable dining rooms',
                            'Over 50,000 sq ft of amenities',
                            'Indoor and outdoor spaces flow together naturally. In each residence, living rooms and primary bedrooms open onto deep terraces with glass railings for unobstructed vistas',
                            'Graciously appointed kitchens include custom high-gloss Italian cabinetry and Wolf Sub-Zero appliances, such as wine coolers and integrated refrigerators',
                            'Residences are available with one to four bedrooms. Generously proportioned primary bedrooms include floor-to-ceiling windows, expansive terraces, and walk-in wardrobes',
                            'Exquisite primary bathrooms feature sculptural stand-alone bathtubs, floor-to-ceiling tiled glass-enclosed showers, and vanities with enlarged backsplash and premium Italian cabinets'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/cipriani-residences/feature3.jpg'
                    ]
                ]
            ]
        ],
        'waldorf-astoria' => [
            'location' => 'miami',
            'title' => 'Waldorf Astoria',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Downtown',
            'type' => 'Apartmnet, 3 bedroom',
            'price' => 'from 3 942 000$',
            'for' => 'For living / For resale / For long term rental',
            'completion_date' => '202X',
            'payment_plan' => '+',
            'image' => '/images/projects/waldorf-astoria/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 3942000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/waldorf-astoria/banner.jpg',
                'label' => 'The tallest building in Florida',
                'description' => "This building is one of the world's most prestigious luxury hotel brands, owned by Hilton Hotels. The tower offers 100 floors and 360 residences",
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'With the help of Sieger Suarez, the famous architect Carlos Ott designed the building to resemble a pile of unevenly stacked glass cubes. At 1,049 feet tall, Waldorf Astoria Hotel and Residences Miami is Miami’s tallest tower and Miami’s first super-tall skyscraper.',
                        'description' => 'Residences have dramatic views of Biscayne Bay, the Port of Miami, Brickell Avenue, Downtown Miami, Key Biscayne, and South Beach. Carlos Ott is the mastermind behind the famous Burj Al Arab in Dubai and unique residential buildings in Miami like Echo Brickell, Echo Aventura, and Muse Sunny Isles.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/waldorf-astoria/feature1.jpg',
                        'text' => 'Designed by the world famous architect, Carlos Ott',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/waldorf-astoria/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "Waldorf Astoria Miami's perfect location allows residents to live just minutes away from the new Miami World Center, several cultural attractions, arts, tourism, and fashion",
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/waldorf-astoria/feature3.jpg'
                    ]
                ]
            ]
        ],
        'bloom' => [
            'location' => 'mexico',
            'title' => 'Bloom',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 639 000$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q2 April 2025',
            'payment_plan' => 'Down Payment 30%',
            'image' => '/images/projects/bloom/preview.jpg',
            'mode' => 'more',
            'price_digit' => 639000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/bloom/banner.jpg',
                'label' => 'A paradise with access to the sea',
                'description' => 'The residential complex location is on the shore of the Marina',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Each tower has an 18-month construction period, with the next one starting every six months after construction. So, all of the buildings will deliver in phases.',
                        'description' => 'The land area is 7000m2. There will be 3 towers on four floors, 32 flats with three and two bedrooms. All apartments will overlook the marina; the fourth-floor flats will be in penthouse style. The fourth-floor apartments will have a sea view.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/bloom/preview.jpg',
                        'text' => 'The residential complex will have two swimming pools, a large relaxation area, a marina and a jetskis and parking',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/bloom/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "There will be a beach, a small restaurant and a beach club next to the residential complex.All flats will be partly furnished: fully equipped kitchen, bathrooms, air conditioning, interior doors, plumbing.",
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/bloom/feature3.jpg'
                    ]
                ]
            ]
        ],
        'bentley-residences' => [
            'location' => 'miami',
            'title' => 'Bentley Residences',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Sunny Isles Beach',
            'type' => 'Apartmnet',
            'price' => 'from 5 600 000$',
            'for' => 'For living / For resale / For long term rental',
            'completion_date' => '2027',
            'payment_plan' => '+',
            'image' => '/images/projects/bentley-residences/preview.jpg',
            'mode' => 'more',
            'price_digit' => 5600000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/bentley-residences/banner.jpg',
                'label' => 'Lift to extraordinary heights',
                'description' => 'Over 20,000 square feet of amenities across three levels, exquisitely designed by Bentley, featuring furnishings from the Bentley Home collection',
                'options' => [
                    [
                        'title' => 'Fitness Center',
                        'description' => 'The Center includes an outdoor terrace fitted with gym equipment and Yoga Studio with an ocean view.'
                    ],
                    [
                        'title' => 'Movie Theater',
                        'description' => 'With plush seating for 14 people designed to mimic a Bentley car interior.'
                    ],
                    [
                        'title' => 'Exclusive beach amenities',
                        'description' => 'The amenities include food and beverage service, beach attendants, chaise lounges, and umbrellas.'
                    ]
                ],
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'From the moment you glide into the Dezervator™, you’ll experience spectacular space designed to transform the every day into the extraordinary.',
                        'description' => 'With waterfront views engulfing the entire residence, you can immerse yourself in spectacular vistas that promise to take your breath away daily.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/bentley-residences/feature1.jpg',
                        'text' => 'Lobby Bar and Restaurant with 33-foot high floor-to-ceiling windows optimizing ocean views',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/bentley-residences/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "Residence Features",
                        'list' => [
                            'Sweeping Atlantic Ocean and Intracoastal views through floor-to-ceiling windows',
                            'Private 3 or 4-car garages in each residence accessible  through the Dezervator™ vehicular elevator system',
                            'Private heated swimming pools with raised sundeck',
                            'Oversized balcony and terraces creating a luxurious outdoor living environment adjacent to the family room',
                            'Summer kitchens with Gaggenau Vario electric grill',
                            'Laundry room with ventless Bosch washer and dryers',
                            'Smart climate controls with digital thermostats',
                            'Custom levers on door handles featuring Bentley diamond design',
                            'Spacious interiors with elegant smooth-finish ceilings rising to 10-feet clear, except where required to accommodate mechanical equipment',
                            'Entryway from private elevator foyer through 8-foot double-door grand entrance'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/bentley-residences/feature3.jpg'
                    ]
                ]
            ]
        ],
        'nalu-luxury-residences' => [
            'location' => 'mexico',
            'title' => 'NALU Luxury Beachfront Residences',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Morelos',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 599 200$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q1 2023',
            'payment_plan' => 'Different Options',
            'image' => '/images/projects/nalu-luxury-residences/preview.jpg',
            'mode' => 'more',
            'price_digit' => 599200,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/nalu-luxury-residences/banner.jpg',
                'label' => 'Sweet and mystical experiences',
                'description' => 'At NÁLU Luxury Beachfront Residences, you will live sweet and mystical experiences through proximity to the sea',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'NÁLU Luxury Beachfront Residences has 12 exclusive luxury apartments, making it the most attractive development in Puerto Morelos.',
                        'description' => 'At NÁLU Luxury Beachfront Residences, you will live sweet and mystical experiences through proximity to the sea. You will create unparalleled stories by being surrounded by the majestic mangrove swamp, its magical cenotes, and the imposing beauty of its coral reefs.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/nalu-luxury-residences/feature1.jpg',
                        'text' => 'Fall in love with Puerto Morelos’ magic and unique lifestyle',
                        'description' => '18 months interest free'
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/nalu-luxury-residences/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "The land area is 7000 sq.m.",
                        'description' => '<p>Puerto Morelos is the Mayan Riviera’s hidden. Its beautiful and paradisiacal beaches, with a wonderful blue sea, create an enigmatic and mystical atmosphere that evokes profound peace and tranquility.</p><p>The dreamlike sunrises and sunsets in Puerto Morelos generate an energy that reminds us of our connection to life, making it the ideal place to find yourself again.</p>'
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/nalu-luxury-residences/feature3.jpg'
                    ]
                ]
            ]
        ],
        'damac-bay-cavalli' => [
            'location' => 'dubai',
            'title' => 'Damac Bay by Cavalli',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai Marina - Dubai Harbour',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 814 200$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => '2027',
            'payment_plan' => '+',
            'image' => '/images/projects/damac-bay-cavalli/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 814200,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/damac-bay-cavalli/banner.jpg',
                'label' => 'A new wave of seaside luxury concept',
                'description' => 'Escape to a lush tropical paradise and embrace the charm of the wild at DAMAC Bay 2',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Surround yourself with the sky, sun, and sea from the comfort of 1, 2, 3, 4, and 5-bedroom luxury apartments with stunning views of the sea and shore.',
                        'description' => 'This 49-story Cavalli-inspired sanctuary is an architectural masterpiece of splendor, luxury, and beauty, where you can experience one-of-a-kind amenities such as floating relaxation pods, beauty and body treatments in glamping tents, and aqua treatments like hydrotherapy and hot tub boats.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/damac-bay-cavalli/feature1.jpg',
                        'text' => 'Dubai Harbour – one of the city’s premier seafront districts',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/damac-bay-cavalli/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "Discover paradise found and answer the exotic call of the wild at DAMAC Bay 2"
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/damac-bay-cavalli/feature3.jpg'
                    ]
                ]
            ]
        ],
        'grand-peninsula' => [
            'location' => 'mexico',
            'title' => 'Grand Peninsula',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 3 bedroom',
            'price' => 'from 779 000$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => '2025',
            'payment_plan' => 'Down Payment 30%',
            'image' => '/images/projects/grand-peninsula/preview.jpg',
            'mode' => 'more',
            'price_digit' => 779000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/grand-peninsula/banner.jpg',
                'label' => 'A private residence of such scale',
                'description' => 'The residential complex is located on the shore of the Marina',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'The average monthly rent for a one-year lease ranges from 3,500 USD for a two-bedroom flat to 4,000 USD for a three-bedroom apartment. It is very popular with tenants, and we always get rental requests.',
                        'description' => 'This is the second phase of one of the most popular residential complexes in Puerto Aventuras. The primary tenant, the buyer, is a high-income audience.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/grand-peninsula/preview.jpg',
                        'text' => 'Construction has already started, the first tower has already been built, construction has started on the second tower',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/grand-peninsula/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "All flats will have 3 bedrooms, 2 full bathrooms and guest toilet, spacious lounge, kitchen and master bedroom with marina view, third and fourth floor have sea view.Each tower has its own swimming pool, its own parking. There will be a private beach. The compound is under its own private security which gives you control of the access to the area.",
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/grand-peninsula/feature3.jpg'
                    ]
                ]
            ]
        ],
        'nexo-residences' => [
            'location' => 'miami',
            'title' => 'NEXO Residences',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'North Miami Beach, Florida',
            'type' => 'Residence Units',
            'price' => 'from 505 785$',
            'for' => 'For living / For resale / For long term rental',
            'completion_date' => '2025',
            'offer' => 'EB 5 program — you can get green card for the investment in this project',
            'image' => '/images/projects/nexo-residences/preview.jpg',
            'mode' => 'more',
            'price_digit' => 505785,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/nexo-residences/banner.jpg',
                'label' => 'A new, urban autonomy',
                'description' => 'For independent homeowners, featuring 15 stories and 254 luxury residences',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Fully-furnished studios, 1 to 4 bedroom configurations, designed for home-sharing.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/nexo-residences/feature1.jpg',
                        'text' => 'Real Estate & Building Capabilities',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/nexo-residences/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "All Units will include",
                        'list' => [
                            'Smart key access',
                            'Smart home management',
                            'Self-service package lockers',
                            'Residential booking management',
                            'Housekeeping',
                            'Guest communication with On-Site Concierge Services'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/nexo-residences/feature3.jpg'
                    ]
                ]
            ]
        ],
        'west-eleventh' => [
            'location' => 'miami',
            'title' => 'West Eleventh',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Downtown',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 511 000$',
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => '2025',
            'payment_plan' => '+',
            'image' => '/images/projects/west-eleventh/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 511000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/west-eleventh/banner.jpg',
                'label' => 'The first centrally managed luxury condo residences',
                'description' => 'West Eleventh has reimagined luxury condo home ownership by providing true living flexibility',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Internationally renowned architecture firm Seiger Suarez Architects designed this 44-story luxury tower, infusing it with artistic attention throughout.',
                        'description' => 'They have thoughtfully curated each fully finished and furnished studio and 1-bedroom residence.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/west-eleventh/feature1.jpg',
                        'text' => 'Each fully furnished residence offers a place to call home and an opportunity to uniquely host on Airbnb',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/west-eleventh/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "What concepts do we cover",
                        'list' => [
                            'Grant owners the option to host 365 days on Airbnb',
                            'Take living to a new direction never before imagined',
                            "Modern life is in perpetual motion, we're always on the move",
                            'An ownership experience with true living flexibility'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/west-eleventh/feature3.jpg'
                    ]
                ]
            ]
        ],
        'secret-waters' => [
            'location' => 'mexico',
            'title' => 'Secret Waters',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 421 000$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q4 2023',
            'payment_plan' => 'Down Payment 30%',
            'image' => '/images/projects/secret-waters/preview.jpg',
            'mode' => 'more',
            'price_digit' => 421000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/secret-waters/banner.jpg',
                'label' => 'A new spectacularly spacious condominiums',
                'description' => 'The complex is a 10-minute walk to the beach, restaurants, and shops and has a large, green common area, a seating area for residents, and a barbecue area',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Secret Waters is the second phase of the apartment complex. 15 ago, a company built the first phase of the apartment complex, and it became a trendy building with many tenants.',
                        'description' => 'The new part will have 3 towers with 8 flats in each tower. The sale of the first tower has already been completed. The first tower is scheduled for completion in late autumn this year. The entire project is scheduled for completion at the end of year 23.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/secret-waters/feature1.jpg',
                        'text' => 'The project is located overlooking the Dolphinarium, has the longest swimming pool in Puerto Aventuras 50m',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/secret-waters/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "All flats will have 2 bedrooms, 2 full bathrooms plus a guest toilet and a spacious living room with a kitchen. Flats on the fourth floor will have its own entrance to the roof overlooking the sea. All flats will be fully equipped with kitchen, bathrooms, interior doors, air conditioning."
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/secret-waters/feature3.jpg'
                    ]
                ]
            ]
        ],
        'nunna' => [
            'location' => 'mexico',
            'title' => 'Nunna',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Puerto Aventuras',
            'type' => 'Apartment, 2 bedroom',
            'price' => 'from 450 000$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q4 2023',
            'payment_plan' => '+',
            'image' => '/images/projects/nunna/preview.jpg',
            'mode' => 'more',
            'price_digit' => 450000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/nunna/banner.jpg',
                'label' => 'Different types and configurations space',
                'description' => 'Nunna residential complex, located in Puerto Aventuras',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'The ground floor flats will have their tiny swimming pool on the terrace and a small garden. The total floor area of the ground floor flats is 171 m2. Of which: 120m2 living space, 38m2 terrace, 13m2 garden.',
                        'description' => 'Second and third-floor flats: 2 bedrooms, 2 bathrooms, space for washing machine and dryer, terrace, lounge, dining area, kitchen. Flat on the fourth floor will be built in the style of a Penthouse. 2 bedrooms, 2 bathrooms, a lounge, a dining area, a kitchen, a washing and drying room, a terrace, and stairs to the first floor where there is an open terrace overlooking the marina and the sea and a private swimming pool on the roof. All roof terraces will have a sun awning and a mini open kitchen (barbecue area, sink, and shower).'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/nunna/feature1.jpg',
                        'text' => 'The building will be built overlooking the marina and the sea',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/nunna/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "In total there will be 8 flats, a swimming pool, a green area, a relaxation area near the swimming pool, one parking space for each flat and a lift. Each flat will have: 2 bedrooms, 2 bathrooms, lounge, kitchen, space for washing machine and storage"
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/nunna/feature3.jpg'
                    ]
                ]
            ]
        ],
        '600-wordcenter' => [
            'location' => 'miami',
            'title' => '600 Worldcenter',
            'country' => 'USA',
            'city' => 'Miami',
            'location_full' => 'Miami, Downtown',
            'type' => 'Apartment, Studio',
            'price' => 'from 432 000$',
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => '2026',
            'payment_plan' => '+',
            'image' => '/images/projects/600-wordcenter/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 432000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/600-wordcenter/banner.jpg',
                'label' => 'A great investment opportunity in the New Center of Miami',
                'description' => '600 Miami World Center is the latest iconic, high-end urban living experience in the center of the new Downtown Miami',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => "Miami World Center brings new energy to Miami with a blend of retail, office, hospitality, and residential offerings in one unique location. Center is the U.S.'s second largest and most exciting urban development, at nearly 30 acres.",
                        'description' => 'Miami Worldcenter is the epicenter of the city, surrounded by over 3 Billion Dollars of new public and private projects, including mass transit, museums, parks, sports venues, entertainment, luxury retail, and signature restaurants.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/600-wordcenter/feature1.jpg',
                        'text' => 'This new luxury tower will feature 32 stories and 579 fully furnished residences with the AirBnb Rental Capacity',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/600-wordcenter/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "This amazing residential development will feature Studios, One Bedrooms, One + Den and 2 bedroom configurations, with the great opportunity to rent it daily, weekly or monthly on the most popular platforms such as Airbnb… maximizing the profitability of the property"
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/600-wordcenter/feature3.jpg'
                    ]
                ]
            ]
        ],
        'upper-house' => [
            'location' => 'dubai',
            'title' => 'Upper House',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai, JLT',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 336 600$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q1 2026',
            'payment_plan' => '+',
            'image' => '/images/projects/upper-house/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 336600,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/upper-house/banner.jpg',
                'label' => 'More than just a resident',
                'description' => 'Upper House is a place that broadens horizons by maximizing access to a wealth of facilities and offering expansive views of Jumeirah Islands and Marina Skyline',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'The residential development comprises outstanding units ranging from studios to one, two, and three-bedroom apartments and features exceptional amenities. ',
                        'description' => 'From a 37-meter lap pool to a kids’ splash pad, a padel and an urban basketball court, a barbecue area, a podcast room, a fitness studio with a climbing wall, a yoga studio, a clubhouse with a records lounge, a space dedicated for artists in residence, a gallery wall, a workspace and so on.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/upper-house/feature1.jpg',
                        'text' => 'In its centrally located apartments and its holistic design philosophy',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/upper-house/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "With an easy-going community vibe and a range of amenities, Jumeirah Lakes Towers is situated across the world-class Dubai Marina and has become an ideal residential community for families as well as individuals who want to live in an area surrounded by a panoramic waterfront promenade and breath-taking landscapes"
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/upper-house/feature3.jpg'
                    ]
                ]
            ]
        ],
        'ceiba-condo-paradise' => [
            'location' => 'mexico',
            'title' => 'Ceiba 25 Condo Paradise',
            'country' => 'Mexico',
            'city' => 'Riviera Maya',
            'location_full' => 'Mexico, Playa del Carmen',
            'type' => 'Apartment/ Penthouses, 1 bedroom',
            'price' => 'from 357 000$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => '2025',
            'payment_plan' => '+',
            'image' => '/images/projects/ceiba-condo-paradise/preview.jpg',
            'mode' => 'more',
            'price_digit' => 357000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/ceiba-condo-paradise/banner.jpg',
                'label' => 'Paradise is your home',
                'description' => 'An exclusive residence project that raises the standards of design, luxury and comfort in developments along the Riviera Maya',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'The location is excellent as the lifestyle you dream of, located in Playa del Carmen. You will discover the exceptional natural and cultural surroundings by drawing the curtains in your room.',
                        'description' => 'The complex is located in the Golden Zone, steps away from the white sand beaches, amazing turquoise waters, and the famous 5th Avenue. It is world-famous for its gastronomic and commercial diversity.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/ceiba-condo-paradise/feature1.jpg',
                        'text' => 'Rooftop with a interior view into the bulding, providing life into the common areas',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/ceiba-condo-paradise/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "Amenities",
                        'list' => [
                            'Restaurant',
                            'Infinity pool',
                            'Fitness centre',
                            'Poolside bar',
                            'Car park',
                            'Multipurpose room'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/ceiba-condo-paradise/feature3.jpg'
                    ]
                ]
            ]
        ],
        'the-edge' => [
            'location' => 'dubai',
            'title' => 'The Edge',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai, Business Bay',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 350 160$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => 'Q4 2026',
            'payment_plan' => '+',
            'image' => '/images/projects/the-edge/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 350160,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/the-edge/banner.jpg',
                'label' => 'A truly cosmopolitan living experience',
                'description' => 'The EDGE introduces an eclectic urban vibe to the city, defined by its modern architecture and signature interior design of bold, contrasting color palettes.',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Make the most of your downtime and go beyond condominium living at The EDGE’s wide range of lifestyle facilities, including a co-working space, games room, social lounge, and more!',
                        'description' => 'Spanning over 61,000 sq.ft., the leisure deck of the podium level offers a haven of well-being and fun for all, including a large fully equipped gymnasium, infinity pool, outdoor gym, padel courts, pickleball/basketball court, barbecue area, and a selection of seating and lounge areas.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/the-edge/feature1.jpg',
                        'text' => 'Say hello to a truly cosmopolitan living experience on the EDGE of Downtown Dubai and Business Bay',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/the-edge/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "A Complex Features",
                        'list' => [
                            'Location - the City of your Doorstep',
                            'Vibrant design',
                            'Building by Select Group'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/the-edge/feature3.jpg'
                    ]
                ]
            ]
        ],
        'cuddles-berawa' => [
            'location' => 'bali',
            'title' => 'Cuddles Berawa Project',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Berawa',
            'type' => 'Villa, two (2) options',
            'price' => [
                '250 000$ for 1 bed',
                '320 000$ for 2 bed'
            ],
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => 'Q1 2024',
            'rent_out' => '12% - 17.85% ROI',
            //'buy_out' => '100-130% after development',
            //'payback' => '5-6 years',
            'image' => '/images/projects/cuddles-berawa/preview.jpg',
            'mode' => 'invest',
            'price_digit' => [250000, 320000],
            'square' => null,
            'price_per_square' => null
        ],
        'umalas-premier' => [
            'location' => 'bali',
            'title' => 'Umalas Premier Project',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Umalas',
            'type' => 'Townhouse, 2 bedroom',
            'price' => '260 000$',
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => 'Q3 2023',
            'rent_out' => '16 - 23% ROI',
            //'buy_out' => '100-130% after development',
            //'payback' => '5-6 years',
            'image' => '/images/projects/umalas-premier/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 260000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/umalas-premier/banner.jpg',
                'label' => 'A new complex of modern villas',
                'description' => 'A complex of 30 modern villas in a picturesque area of Bali — Umalas (next to Canggu, Seminyak)',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'Umalas is a small area 5 minutes from Canggu, between the districts of Canggu and Seminyak with growing popularity among tourists and expats.',
                        'description' => 'A unique area, including all amenities necessary for a comfortable stay: cafes, sports and beach clubs, SPA complexes, shops, schools and kindergartens. And 3 (three) interior design options.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/umalas-premier/feature1.jpg',
                        'text' => '“I’ve bought a villa in Bali, what’s next?”',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/umalas-premier/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "What include",
                        'list' => [
                            'The area is gaining popularity',
                            'Passive income in USD',
                            'High season all year round'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/umalas-premier/feature3.jpg'
                    ]
                ]
            ]
        ],
        'sunny-apart-1' => [
            'location' => 'bali',
            'title' => 'Sunny Apart 1',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 180 000$',
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => 'Q1 2024',
            'rent_out' => '9,8 - 20,6% ROI',
            //'buy_out' => '100-130% after development',
            //'payback' => '5-6 years',
            'image' => '/images/projects/sunny-apart-1/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 180000,
            'square' => null,
            'price_per_square' => null
        ],
        'sunny-apart-2' => [
            'location' => 'bali',
            'title' => 'Sunny Apart 2',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Berawa',
            'type' => 'Apartment, 1 bedroom',
            'price' => 'from 180 000$',
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => 'Q2 2024',
            'rent_out' => '12% ROI',
            //'buy_out' => '100-130% after development',
            //'payback' => '5-6 years',
            'image' => '/images/projects/sunny-apart-2/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 180000,
            'square' => null,
            'price_per_square' => null
        ],
        'batu-bolong' => [
            'location' => 'bali',
            'title' => 'Batu Bolong Project',
            'country' => 'Indonesia',
            'city' => 'Bali',
            'location_full' => 'Canggu, Batu Bolong',
            'type' => 'Townhouse, 2 bedroom',
            'price' => '350 000$',
            'for' => 'For living / For resale / For short term rental',
            'completion_date' => 'Q2 2023',
            'rent_out' => '14,5 - 20,5% ROI',
            //'buy_out' => '100-130% after development',
            //'payback' => '5-6 years',
            'image' => '/images/projects/batu-bolong/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 350000,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/batu-bolong/banner.jpg',
                'label' => 'A new complex of modern villas',
                'description' => "TOP 10 Places to Live and Invest based on the Forbes company’s data",
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'We do not just sell villas - we build a full-fledged turnkey business for you and guarantee an ROI of 12% per annum in the contract.',
                        'description' => '<p>If you choose us to manage your property, we will:</p>- Make sure tenants turnover is timely<br>- Serve the guests and resolve their issues.<br>- Maintain the property and amenities.<br>- Generate a passive income of 17-24% net per annum'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/batu-bolong/feature1.jpg',
                        'text' => '“I’ve bought a villa in Bali, what’s next?”',
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/batu-bolong/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "Yes, to earn passive income at the purchased villa, you need to",
                        'list' => [
                            'Attract a sufficient number of tourists on a permanent basis',
                            'Provide high-level service to guests',
                            'Maintain, clean, maintain the villa in good condition, etc.'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/batu-bolong/feature3.jpg'
                    ]
                ]
            ]
        ],
        'sea-heaven' => [
            'location' => 'dubai',
            'title' => 'SeaHeaven',
            'country' => 'UAE',
            'city' => 'Dubai',
            'location_full' => 'Dubai Marina - Dubai Harbour',
            'type' => 'Apartment, 3 bedroom',
            'price' => 'from 2 183 250$',
            'for' => 'For living / For resale / For daily rent',
            'completion_date' => '2026',
            'payment_plan' => '+',
            'image' => '/images/projects/sea-heaven/preview.jpg',
            'mode' => 'invest',
            'price_digit' => 2183250,
            'square' => null,
            'price_per_square' => null,
            'page' => [
                'banner_image' => '/images/projects/sea-heaven/banner.jpg',
                'label' => 'A retreat of luxury, peace, and beauty',
                'description' => 'Sobha SeaHaven is a premium sea-facing destination at Dubai Harbour with ultra-luxury 1–4-Bedroom apartments',
                'features' => [
                    'feature1' => [
                        'type' => 'text',
                        'title' => 'In the heart of Dubai Harbour, Sobha Seahaven offers a spectacular view of Dubai’s beloved landmarks, including Ain Dubai, Palm Jumeirah, Dubai Harbour & the Marina skyline converging with the oceanic horizon.',
                        'description' => 'Sobha Seahaven does situate at the hub of a maritime gateway making it easier to drop anchor and experience the most exclusive destinations.'
                    ],
                    'feature2' => [
                        'type' => 'combined',
                        'image' => '/images/projects/sea-heaven/feature1.jpg',
                        'text' => "It is a unique waterfront neighbourhood near the city's most-loved landmarks",
                    ],
                    'feature3' => [
                        'type' => 'image',
                        'image' => '/images/projects/sea-heaven/feature2.jpg'
                    ],
                    'feature4' => [
                        'type' => 'offer',
                        'text' => "What concepts do we cover",
                        'list' => [
                            'Spectacular sea views',
                            'Specifications to the highest quality by Sobha',
                            '1 to 4 bedroom apartments',
                            'Overlooking the glittering skyline'
                        ]
                    ],
                    'feature5' => [
                        'type' => 'image',
                        'image' => '/images/projects/sea-heaven/feature3.jpg'
                    ]
                ]
            ]
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
