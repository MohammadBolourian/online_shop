<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\Acl\permission;
use App\Models\Acl\role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user-manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::all();
        return view('admin.user.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions =permission::all();
        return view('admin.user.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'description' => ['required', 'string', 'max:255'],
            'permissions' => ['required' ]
        ]);

        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-success', 'دسترسی با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {
        $permissions =permission::all();
        return view('admin.user.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255' , Rule::unique('roles')->ignore($role->id)],
            'description' => ['required', 'string',  'max:255'],
            'permissions' => ['required' , 'array']
        ]);

        $role->update($data);
        $role->permissions()->sync($data['permissions']);
        return redirect()->route('admin.user.role.index')->with('swal-success', 'دسترسی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(role $role)
    {
        $role->delete();
        return redirect()->route('admin.user.role.index')
            ->with('swal-success',' دسترسی با موفقیت حذف شد');
    }
}
