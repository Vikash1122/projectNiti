<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Admin;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard(){

        return auth()->guard('admin');
    }

    public function showLoginFormd(){
        return view('admin_auth.login');
    }

    public function adminlogin(Request $request){
        $data = $request->all();
        
        $admin = Admin::where('email','=',$data['email'])->where('password','=',$data['password'])->first();
        //prd(isset($admin) && !empty($admin));
       // print_r($admin);die();
        if(isset($admin) && !empty($admin)){
            //print_r($admin);die();
            return redirect('admin/dashboard')->with('message','Login Successfully!');
            //return view('admin-home',compact('admin'));
        }else{
            return redirect()->back()->with('message','Login failed! Please enter a correct username or password!');
        }
        //print_r($admin);die();
    }

    
    
}
