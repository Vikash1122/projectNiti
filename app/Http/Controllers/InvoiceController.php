<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;
use Auth;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::check()){
            $complete_jobs = Jobs::allCompleteJobs();
            //prd($complete_jobs);
            return view('admin.invoice.index',compact('complete_jobs'));
        }else{
            return redirect('/admin/login');
        }
    }

    public function show($id){
        if (Auth::check()){
            $job_invoice = Jobs::generateInvoice($id);
            return view('admin.invoice.show',compact('job_invoice'));
        }else{
            return redirect('/admin/login');
        }
    }
}
