<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $platform;
    public $viewPath = '';

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
	}

}
