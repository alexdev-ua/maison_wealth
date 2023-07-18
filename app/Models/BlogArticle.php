<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    const STATUS_DRAFT = -1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'url',
        'page_banner_id',
        'status'
    ];

    public function translate($langId){
        $articleTranslate = BlogArticleTranslate::where('blog_article_id', '=', $this->id)->where('lang_id', '=', $langId)->first();

        if($articleTranslate){
            return $articleTranslate;
        }
        return new BlogArticleTranslate;
    }

    public function options(){
        return $this->hasMany('App\Models\BlogArticleOption', 'blog_article_id');
    }

    public function screens(){
        return $this->hasMany('App\Models\BlogArticleScreen', 'blog_article_id');
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
            BlogArticleTranslate::where('blog_article_id', '=', $id)->delete();
            $options = $this->options;
            if($options){
                foreach ($options as $option) {
                    $option->deleteAllData();
                }
            }
            $screens = $this->screens;
            if($screens){
                foreach ($screens as $screen) {
                    $screen->deleteAllData();
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

    public static $articles = [
        'property-in-dubai' => [
            'title' => 'Property in<br>Dubai',
            'description' => 'Risks involved in property investment: buy apartments in Dubai',
            'date' => '12/06/2023',
            'page' => [
                'title' => 'Risks involved in property investment: buy apartments in Dubai',
                'description' => 'Pros and cons of buying property in Dubai. Only proven objects for life and investment. Underrated Dubai apartments with high income.',
                'banner' => '/images/blog/property-in-dubai/banner.jpg',
                'options' => [
                    'title' => 'Factors to consider:',
                    'list' => [
                        [
                            'title' => 'Neighborhood and conditions',
                            'description' => "In Freehold, all foreign citizens can buy apartments in Dubai and make any manipulations with land and other real estate. In Leasehold purchase and sale of real estate is allowed exclusively to citizens of the UAE and some Arab countries. Before you purchase, you must be familiarized with the object's status to correctly assess all possibilities and dangers."
                        ],
                        [
                            'title' => "Developer's reliability",
                            'description' => "Visit the construction site, communicate with company representatives, study the project, and compare it with similar objects. If you consider buying property on the secondary market, have time to talk with the tenants and evaluate the quality of the management company."
                        ],
                        [
                            'title' => 'Assess your capabilities',
                            'description' => "Remember that in the UAE legal system, having a debt falls under the definition of a criminal offense, not an administrative one. Developers often offer favorable installment terms (20/80 or 30/70), but your financial situation may change during construction. The urgent real estate sale might require a significant decrease in value."
                        ]
                    ]
                ],
                'screens' => [
                    [
                        'title' => 'Additional real estate <span class="red-text">opportunities</span> for investors',
                        'description' => 'As you can see, many risks exist, but we know how to solve them!',
                        'list' => [
                            'Even though significant fines are paid for missed deadlines, many new buildings deliver with a delay. Pay attention to the length of delays in the already completed projects of the developer you have chosen',
                            'Find out the specialization of the developer, make additional inquiries, and make sure that the necessary infrastructure is around the object',
                            'Include in your budget the following: DLD fees (4% of the property value), certificate of ownership fee (Title Deed) - $ 136, purchase and sale insurance - $ 1100, real estate agent commission - 2% of the property value, certificate of no objection ( NOC) - $1300',
                            'It is better to entrust a preliminary real estate market analysis to minimize risks and eliminate unwanted costs'
                        ],
                        'image' => '/images/blog/property-in-dubai/screen1.jpg',
                        'align' => 'left'
                    ],
                    [
                        'heading' => '<span class="gray-text">Start investing</span> in Dubai (UAE), <span class="gray-text">think it over and we will be there for you.</span>',
                        'image' => '/images/blog/property-in-dubai/screen2.jpg',
                        'align' => 'right',
                        'fixed' => true
                    ],
                ]
            ]
        ],
        'property-in-dubai-and-miami' => [
            'title' => 'Property in<br>Dubai and Miami',
            'description' => 'Increase your capital by investing in real estate UAE—guaranteed options with high ROI',
            'date' => '12/06/2023',
            'page' => [
                'title' => 'Increase your capital by investing in real estate UAE—guaranteed options with high ROI',
                'description' => 'Invest with Maison Wealth. High level of profitability investment for foreigners and the opportunity for a non-residence visa. Fast payback of real estate in Dubai.',
                'banner' => '/images/blog/property-in-dubai-and-miami/banner.jpg',
                'options' => [
                    'title' => 'What about?',
                    'list' => [
                        [
                            'title' => 'Real estate investment',
                            'description' => "A popular way to invest and earn a stable passive income."
                        ]
                    ]
                ],
                'screens' => [
                    [
                        'title' => 'What are the <span class="red-text">benefits</span> of buying real estate in the USA?',
                        'description' => 'As you can see, many risks exist, but we know how to solve them!',
                        'list' => [
                            'Statistics have a significant positive trend, which means income growth',
                            'The US economy considers the most stable in the world, so buying real estate here is a safe and profitable investment option',
                            'According to the data, the return on investment in rental property in Miami is 30% higher than the assets in the market',
                            'According to the data, the return on investment in rental property in Miami is 30% higher than the assets in the market',
                            'Thanks to improving demographics and a healthy job market, demand for rental housing is growing in all states. In recent years, the number of tenants with incomes between $25 and $100,000 has increased by an average of 2.5 million, and demand for family homes has grown by 40%'
                        ],
                        'image' => '/images/blog/property-in-dubai-and-miami/screen1.jpg',
                        'align' => 'left'
                    ],
                    [
                        'title' => 'What about <span class="red-text">return</span> on property investment in Dubai',
                        'description' => 'The last ten years have shown that the investment climate in the UAE has improved significantly and has made the state an attractive place to invest capital.',
                        'list' => [
                            'Buying and selling property in Dubai is lower than in other major cities',
                            'The annual yield from renting a cheap apartment in Dubai averages 6%, much higher than, for example, in Singapore, Hong Kong, or London',
                            'Purchasing an apartment in Dubai consists of zero tax, government support for foreign investors, and obtaining a residence permit',
                            'The main features of a profitable property are a short payback period, no downtime in the lease, a promising area, availability of infrastructure, and good repair'
                        ],
                        'image' => '/images/blog/property-in-dubai-and-miami/screen2.jpg',
                        'align' => 'right'
                    ],
                    [
                        'heading' => '<span class="gray-text">Start investing</span> in Dubai (UAE), <span class="gray-text">think it over and we will be there for you.</span>',
                        'image' => '/images/blog/property-in-dubai-and-miami/screen3.jpg',
                        'align' => 'left',
                        'fixed' => true
                    ],
                ]
            ]
        ]
    ];

    public static function getAll(){
        return self::$articles;
    }

    public static function getByKey($key){
        $articles = self::$articles;
        if(isset($articles[$key])){
            return $articles[$key];
        }
        return null;
    }
}
