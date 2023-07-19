<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AdminController extends Controller
{
	public function saveProfile(Request $request){
        $params = $request->all();

		$rules = [
			'name' => ['required']
		];

		$validator = Validator::make($params, $rules);

		if(!$validator->fails()) {
			$me = Admin::find(Auth::guard('admin')->user()->id);

			if($me){
				$me->name = $request->name;
				$oldAvatar = NULL;
				$newAvatarCheck = false;

				if($request->file('avatar')){
					$avatar = $request->file('avatar');

					$path = public_path('/media');
			        if(!is_dir($path)) {
			            mkdir($path, 0755, true);
			        }

			        $avatarFile = md5(microtime()).'.'.$avatar->getClientOriginalExtension();
			        $avatar->move($path, $avatarFile);

					if($me->avatar){
						$oldAvatar = public_path('/media').'/'.$me->avatar;
					}

					$me->avatar = $avatarFile;

					$newAvatarCheck = true;
		        }

				if($request->password){
					$me->password = Hash::make($request->password);
				}

				if($me->save()){
					if($newAvatarCheck){
						if(file_exists($oldAvatar)){
				            unlink($oldAvatar);
				        }
					}

					return response(['result' => 'success', 'user' => ['name' => $me->name, 'avatar' => $me->avatar()]], 200);
				}
			}
			return response(['Not saved'], 500);

		}else{
			return response(['errors' => $validator->errors()], 422);
		}
		return response(['Server error'], 500);
	}

}
