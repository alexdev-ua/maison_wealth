<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminLoginController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowLoginForm()
    {
		$data = [
			'title' => 'Admin - Login',
		];
       return View::make('dashboard.pages.'.$this->viewPath.'.login')->with(['data' => $data]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
     public function Login(Request $request)
      {
        $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required|min:2'
        ]);

       if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
          return redirect()->route('dashboard');
         }

        return redirect()->back()->withInput($request->only('email', 'remember'));
      }

	  public function Logout()
		{
		  Auth::guard('admin')->logout();
		  return redirect()->route('login');
		}

}
