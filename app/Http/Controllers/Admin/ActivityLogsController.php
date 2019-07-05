<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use App\User;

class ActivityLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        //prd($keyword);
        if (!empty($keyword)) {
            $activitylogs = Activity::where('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activitylogs = \DB::table('activity_log')->latest()->paginate($perPage);
            //$activitylogs = Activity::latest()->paginate($perPage);
          
            foreach($activitylogs as $actvity){
                $actvity->causer = User::select('admins.id','admins.firstname','admins.lastname','role_user.role_id','roles.name as role_name')
                                        ->join('role_user','role_user.user_id','=','admins.id')
                                        ->join('roles','roles.id','=','role_user.role_id')
                                        ->where('admins.id','=',$actvity->causer_id)
                                        ->first();
            }
           
            
        }

        return view('admin.activitylogs.index', compact('activitylogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $activitylog = Activity::findOrFail($id);

        return view('admin.activitylogs.show', compact('activitylog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Activity::destroy($id);

        return redirect('admin/activitylogs')->with('flash_message', 'Activity deleted!');
    }
}
