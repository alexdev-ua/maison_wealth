<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;

use App\Models\Helper;
use App\Models\Lang;
use App\Models\Media;
use App\Models\Page;

class DashboardController extends Controller
{
	public function index(){
		$data = [
			'title' => 'Dashboard',
			'page' => 'home',
		];

		if($this->platform != 'desktop'){
			return View::make('dashboard.pages.in_development')->with([
				'data' => $data,
				'admin' => Auth::user(),
			]);
		}
		$dashStats = Helper::getStats();

		return View::make('dashboard.pages.desktop.index')->with([
			'data' => $data,
			'admin' => Auth::user(),
			'dashStats' => $dashStats,
		]);
	}

	public function list($model, Request $request){

		$records = Helper::getRecords($model, $request->id);

		if($request->ajax()){
			return View::make('dashboard.includes.desktop.'.$model.'.list')->with([
				'records' => $records,
			]);
		}else{
			$data = [
				'title' => 'MW Dashboard - '.ucfirst($model),
				'page' => $model,
			];

			if($this->platform != 'desktop'){
				return View::make('dashboard.pages.in_development')->with([
					'data' => $data,
				]);
			}

			$modal = [
				'title' => ucfirst($model),
			];

			if($model == 'pages'){
				$data['availablePages'] = Page::AVAILABLE_PAGES;
			}

			return View::make('dashboard.pages.desktop.'.$model.'.index')->with([
				'data' => $data,
				'records' => $records,
				'admin' => Auth::user(),
				'modal' => $modal,
				'model' => $model
			]);
		}
	}

	public function form($model, $mode, Request $request){
        $id = $request->id;
		$view = 'dashboard.includes.';

        if($mode == 'delete'){
            $view .= 'forms.delete';
        }else if($mode == 'view'){
            $view .= 'forms.'.$model.'.view';
        }else if($mode == 'select-photo'){
            $view .= 'forms.'.$model.'.select_list';
        }else{
            $view .= 'forms.'.$model.'.create_update';
        }

		if($mode == 'select-photo'){
			$data['records'] = Helper::getRecords($model);
		}else{
			$data = Helper::getFormData($model, $mode, $id, $request->parentId);
		}

        return View::make($view)->with($data);
	}

	public function formPage($model, $mode, Request $request){
        $id = $request->id;

		$data = Helper::getFormData($model, $mode, $id, null);

		$data['modal'] = [
			'title' => ucfirst($model)
		];

		$data['data'] = [
			'title' => 'MW Dashboard - '.ucfirst($model),
			'page' => $model,
		];

		if($this->platform != 'desktop'){
			return View::make('dashboard.pages.in_development')->with($data);
		}

        return View::make('dashboard.pages.desktop.'.$model.'.add_edit')->with($data);
	}

	public function save($model, Request $request){
        $id = $request->id;
        $params = $request->all();

		//checkboxes
		$paramsForCheck = [];
		if(in_array($model, ['properties', 'langs', 'testimonials', 'articles', 'directions'])){
			$paramsForCheck = ['status'];
		}
		if($model == 'properties'){
			$paramsForCheck = array_merge($paramsForCheck, [
				'for_living',
				'for_resale',
				'for_long_rent',
				'for_daily_rent',
				'on_main'
			]);
		}
		if(count($paramsForCheck)){
			foreach($paramsForCheck as $paramCheck){
				if(!isset($params[$paramCheck])){
					$params[$paramCheck] = 0;
				}
			}
		}

		if($model == 'property-features' || $model == 'direction-features'){
			$type = $params['type'];

			$allowedFields = [
		        'type',
				'id'
			];

			if($model == 'property-features'){
				$allowedFields[] = 'property_id';
			}else{
				$allowedFields[] = 'direction_id';
			}

			if($type == 'photo' || $type == 'combined'){
				$allowedFields[] = 'media_id';
			}

			foreach($this->langs as $lang){
				if($type != 'photo'){
					$allowedFields[] = 'description_'.$lang->id;
				}

				if($type == 'text'){
					$allowedFields[] = 'title_'.$lang->id;
				}else if($type == 'combined' || $type == 'offer'){
					$allowedFields[] = 'text_'.$lang->id;
				}
			}

			if($type == 'offer'){
				$allowedFields[] = 'list_id';
			}

			foreach($params as $key=>$param){
				if(!in_array($key, $allowedFields)){
					unset($params[$key]);
				}
			}

		}

		$processResult = Helper::proccessFormData($model, $params);

        if($processResult['success']){
			if($model == 'properties' || $model == 'articles' || $model == 'directions'){
				$processResult['data']['redirect'] = '/dashboard/'.$model;
			}
            return response($processResult['data'], 200);
        }
        else{
			return response($processResult['data'], 422);
		}

	}

	public function delete($model, Request $request){
        $id = $request->id;

        if($id){
			$processResult = Helper::deleteRecord($model, $id);
			if($processResult !== true){
            	return response($processResult['data'], 200);
			}
        }
        return null;
	}

	public function upload(Request $request){
        if(!Auth::guard('admin')->user()){
            return response('Unathorized', 401);
        }

        if($request->file('photo')){
			$photos = $request->file('photo');

			$savedPhotos = Media::uploadFiles($photos, $request->index);
        }

        return response(['result' => 'Photo uploaded successfully', 'savedPhoto' => $savedPhotos], 200);
    }

	public function toggleSidebar(Request $request){
		$status = $request->on;

		Cookie::queue(Cookie::make('showSidebar', json_encode($status), 60*24*30));
	}

}
