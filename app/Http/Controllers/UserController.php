<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Amc;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = Admin::get();
        return view('admin.users.index',compact('users'));
    }

    public function search(Request $request){
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $users = Admin::where('firstname', 'LIKE', "%$keyword%")->get();
            
        }else{
            $users = Admin::get();
        }

       return json_encode($users);
    }


    public function show($id){

        $users = Admin::findOrfail($id);
        $amcs = Amc::viewAllAmc($id);
        return view('admin.users.show',compact('users','amcs'));
    }
}
