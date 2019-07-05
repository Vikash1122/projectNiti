<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Role;
use App\User;
use App\Permission;
use App\Group;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Auth::check()){

            $users = User::where('id','!=',1)->get();
            foreach($users as $usr){
                $usr['role_user'] = DB::table('role_user')
                                    ->select('role_user.*','roles.name')
                                    ->leftjoin('roles','roles.id','=','role_user.role_id')
                                    ->where('user_id',$usr->id)
                                    ->first();
            }
//prd($users->toArray());
            return view('admin.team.index', compact('users'));
        }else{
            return redirect('/');
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->get('search');
        if (!empty($keyword)) {
            $users = User::where('firstname', 'LIKE', "%$keyword%")->where('id','!=',1)
                    ->get();
            
        }else{
            $users = User::where('id','!=',1)->get();
        }
        foreach($users as $usr){
            $usr['role_user'] = DB::table('role_user')
                                ->select('role_user.*','roles.name')
                                ->leftjoin('roles','roles.id','=','role_user.role_id')
                                ->where('user_id',$usr->id)
                                ->first();
        }
       return json_encode($users);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        if (Auth::check()){

            $roles = Role::select('id', 'name', 'label')->get();
            $roles = $roles->pluck('name', 'id');

            return view('admin.team.create', compact('roles'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        if (Auth::check()){
            $data = $request->all();
            
            $this->validate(
                $request,
                [
                    'firstname' => 'required',
                    'email' => 'required|string|max:255|email|unique:admins',
                    'password' => 'required|string|min:6|confirmed',
                    'roles' => 'required'
                ]
            );
            $picture = '';
            if ($request->hasFile('admin_profile')) {
                
                $file = $request->file('admin_profile');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/admin/';
                $file->move($destinationPath, $picture);
                
            } 

            $data = $request->except('password');
            $data['password'] = bcrypt($request->password);

            $data1 = array(
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'email'=>$data['email'],
                'mobile'=>$data['mobile'],
                'password'=>$data['password'],
                'admin_profile'=>$picture,
                'group_id'=>(isset($data['group_id'])) ? $data['group_id'] : NULL,
                'status'=>0

            );

            $user = User::create($data1);

            $data1 = array(
                'role_id'=>$data['roles'],
                'user_id'=>$user->id
            );
            $insertRole = DB::table('role_user')->insert($data1);
            // foreach ($request->roles as $role) {
                
            //     $user->assignRole($role);
            // }
            //prd($user);
            if($user){
                return redirect('admin/teams')->with('message', 'Privilege added Successfully!');
            }else{
                return redirect('admin/teams')->with('message', 'Oops! There is something went wrong while adding a team member.');
            }
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        if (Auth::check()){
            $user = User::findOrFail($id);

            return view('admin.team.show', compact('user'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        if (Auth::check()){
            $roles = Role::select('id', 'name', 'label')->get();
            $roles = $roles->pluck('name', 'id');

            $user = User::with('roles')->select('id', 'firstname','admin_profile', 'lastname','mobile', 'email','group_id')->findOrFail($id);
            $user_roles = [];
            foreach ($user->roles as $role) {
                $user_roles[] = $role->id;
            }
           
            $groups = Group::select('id','group_name')->get();
            
           // prd($groups->toArray());
            return view('admin.team.edit', compact('user', 'roles', 'user_roles','id','groups'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()){
            $this->validate(
                $request,
                [
                    'firstname' => 'required',
                    'email' => 'required|string|max:255|email|unique:admins,email,' . $id,
                    'roles' => 'required'
                ]
            );
            $user = User::findOrFail($id);
            $picture = '';
            if ($request->hasFile('admin_profile')) {
                
                $file = $request->file('admin_profile');
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getClientSize();
                $MimeType = $file->getClientMimeType();

                $picture = uniqid(rand()).$filename;
                $destinationPath = public_path() . '/uploads/admin/';
                $file->move($destinationPath, $picture);
                
            }else{
                $picture = $user->admin_profile;
            } 
            

            $data = $request->except('password');
            if ($request->has('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $data1 = array(
                'firstname'=>$data['firstname'],
                'lastname'=>$data['lastname'],
                'email'=>$data['email'],
                'mobile'=>$data['mobile'],
                'group_id'=>(isset($data['group_id'])) ? $data['group_id'] : NULL,
                'admin_profile'=>$picture

            );
            
            $user->update($data1);
            if ($request->has('roles')) {
                $data1 = array(
                    'role_id'=>$data['roles']
                );
                $updateRole = DB::table('role_user')->where('user_id',$id)->update($data1);
            }
            if($user){
                return redirect('admin/teams')->with('message', 'Privilege updated!');
            }else{
                return redirect('admin/teams')->with('message', 'Oops! There is something went wrong while update a team member.');
            }
        }else{
            return redirect('/');
        }
    }

    public function changeStatus(Request $request){
        $data= $request->all();
        if($data['status'] == 1){
            $data1 = array(
                        'status'=> 1
                    );
        }else{
            $data1 = array(
                'status'=> 0
            );
        }
        $update = User::where('id',$data['user_id'])->update($data1);
        if(isset($update) && !empty($update)){
           return json_encode($update);
            
        }else{
            echo '0';
        }
    }

    public function permissionIndex($id){
        if (Auth::check()){
            $role = Role::findOrFail($id);
            $permission = DB::table('permission_role')->where('role_id',$role->id)->get()->pluck('permission_id')->toArray();
           // $pr = (array)$permission;
            //prd($permission->toArray());
            //prd(in_array(11, $permission));
            $permissions = Permission::select('id', 'name', 'label')
                        ->get();
            return view('admin.team.permissions.index',compact('permissions','id','permission'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return void
     */
    public function updatePermission(Request $request, $id)
    {
        if (Auth::check()){
           // $this->validate($request, ['name' => 'required']);

            $role = Role::findOrFail($id);
           
           // $role->update($request->all());
            $role->permissions()->detach();

            if ($request->has('permissions')) {
                foreach ($request->permissions as $permission_id) {
                    $permission = Permission::where('id',$permission_id)->first();
                   // print_r($permission);
                    $role->givePermissionTo($permission);
                }//die();
            }

            return redirect('admin/teams')->with('message', 'Permission updated!');
        }else{
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        if (Auth::check()){
            User::destroy($id);

            return redirect('admin/teams')->with('message', 'Team deleted!');

        }else{
            return redirect('/');
        }
    }
}
