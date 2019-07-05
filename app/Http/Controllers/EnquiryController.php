<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use Auth;

class EnquiryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $quries = ContactUs::select('contact_uses.*','users.firstname','users.lastname','users.mobile')
                ->leftJoin('users','users.id','=','contact_uses.user_id')
                ->orderBy('contact_uses.id','asc')
                ->groupBy('contact_uses.user_id')
                ->get();
        return view('admin.quries.index',compact('quries'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $quries = ContactUs::select('contact_uses.*','users.firstname','users.lastname','users.mobile')
                ->leftJoin('users','users.id','=','contact_uses.user_id')
                ->where('contact_uses.message', 'LIKE', "%$keyword%")
                ->orderBy('contact_uses.id','asc')
                ->groupBy('contact_uses.user_id')
                ->get();
            
        }else{
            $quries = ContactUs::select('contact_uses.*','users.firstname','users.lastname','users.mobile')
                ->leftJoin('users','users.id','=','contact_uses.user_id')
                ->orderBy('contact_uses.id','asc')
                ->groupBy('contact_uses.user_id')
                ->get();
        }

       return json_encode($quries);
    }
}
