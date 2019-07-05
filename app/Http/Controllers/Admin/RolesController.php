<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Auth;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        if (Auth::check()){
            $keyword = $request->get('search');
            $perPage = 15;

            if (!empty($keyword)) {
                $roles = Role::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
            } else {
                $roles = Role::paginate($perPage);
            }

            return view('admin.roles.index', compact('roles'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        if (Auth::check()){
            $limit = 15;
            $role = Role::get();
            $permissions = Permission::select('id', 'name', 'label')->take($limit)->get();
            $perm = array();
            foreach($permissions as $a){
                $a['permissions'] = Permission::select('id', 'name', 'label','heading_id')
                        ->where('heading_id','=',$a->id)->get();
            //array_push($perm,$a['permissions']);
            }

            return view('admin.roles.create', compact('permissions','role'));
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
            $this->validate($request, ['name' => 'required']);
            $data = $request->all();
            $data['status'] = 0;
           // prd($data);
            $role = Role::create($data);
            $role->permissions()->detach();

            if ($request->has('permissions')) {
               // prd($request->all());
                foreach ($request->permissions as $permission_name) {
                    $permission = Permission::where('id',$permission_name)->first();
                    $role->givePermissionTo($permission);
                }
            }

            return redirect('admin/privileges')->with('flash_message', 'Role added!');
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
            $role = Role::findOrFail($id);

            return view('admin.roles.show', compact('role'));
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
            $limit = 15;
            $role = Role::findOrFail($id);
            $permissions = Permission::select('id', 'name', 'label')->take($limit)->get();
            $perm = array();
            foreach($permissions as $a){
                $a['permissions'] = Permission::select('id', 'name', 'label','heading_id')
                        ->where('heading_id','=',$a->id)->get();
            }

            return view('admin.roles.edit', compact('role', 'permissions','id'));
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
    public function update(Request $request, $id)
    {
        if (Auth::check()){
            $this->validate($request, ['name' => 'required']);

            $role = Role::findOrFail($id);
            $role->update($request->all());
            $role->permissions()->detach();

            if ($request->has('permissions')) {
                foreach ($request->permissions as $permission_name) {
                    $permission = Permission::where('id',$permission_name)->first();
                    $role->givePermissionTo($permission);
                }
            }

            return redirect('admin/privileges')->with('flash_message', 'Role updated!');
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
        $update = Role::where('id',$data['role_id'])->update($data1);
        if(isset($update) && !empty($update)){
           return json_encode($update);
            
        }else{
            echo '0';
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
            Role::destroy($id);

            return redirect('admin/privileges')->with('flash_message', 'Role deleted!');
        }else{
            return redirect('/');
        }
    }
}
