<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

use App\Models\Helper;
use App\Models\Lang;
use App\Models\Country;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $platform;
    public $viewPath = '';
    public $activeDashboardLang = 1;
    public $langs;

    public function __construct()
	{
		$agent = new \Jenssegers\Agent\Agent;

        $result = 'mobile';

		$mobileResult = $agent->isMobile();
		if($mobileResult){
			$result = 'mobile';
		}

		$desktopResult= $agent->isDesktop();
		if($desktopResult){
			$result = 'desktop';
		}

		$tabletResult= $agent->isTablet();
		if($tabletResult){
			$result = 'tablet';
		}
		//$result = 'tablet';
		$this->viewPath = $result;
		$this->platform = $result;
		View::share(['platform' => $this->platform]);

        View::share(['countries' => Helper::$countries]);

        $this->middleware(function ($request, $next) {
            $acceptCookies = Cookie::get('acceptCookies', null);

            $showSidebar = Cookie::get('showSidebar', null);

            if($showSidebar){
                $showSidebar = json_decode($showSidebar);
            }else{
                $showSidebar = 1;
            }
            View::share(['showSidebar' => $showSidebar]);

            if($acceptCookies == null){
                $showCookies = true;
            }else{
                $showCookies = false;
            }
            View::share(['showCookies' => $showCookies]);

            $this->langs = Lang::getActive();
            View::share(['langs' => $this->langs]);

            if(Lang::first()){
                $this->activeDashboardLang = Lang::first()->id;
                View::share(['dashLang' => $this->activeDashboardLang]);
            }

            return $next($request);

        });

	}

}
