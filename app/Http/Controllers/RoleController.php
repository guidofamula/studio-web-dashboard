<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = [];

        if ($request->has('keyword')) {
            $roles = Role::where('name', 'LIKE', "%{$request->keyword}%")->get();
        } else {
            $roles = Role::all();
        }

        return view('roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create', [
            'authorities' => config('permission.authorities')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:30|unique:roles,name',
            'permissions' => 'required',
        ],
        [],
        $this->attributes()
    );
        if ($validate->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validate);
        }

        DB::beginTransaction();

        try {
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo($request->permissions);
            Alert::success(
                trans('roles.alert.create.title'),
                trans('roles.alert.create.message.success'),
            );
            
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('roles.alert.create.title'),
                trans('roles.alert.create.message.error', ['error' => $th->getMessage()]),
            );
            
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.detail', [
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'rolePermissions' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'permissionChecked' => $role->permissions->pluck('name')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:30|unique:roles,name' . $role->id,
            'permissions' => 'required',
        ],
        [],
        $this->attributes()
    );
        if ($validate->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validate);
        }

        DB::beginTransaction();

        try {
            $role->name = $request->name;
            $role->syncPermissions($request->permissions);
            $role->save();

            Alert::success(
                trans('roles.alert.update.title'),
                trans('roles.alert.update.message.success'),
            );
            
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('roles.alert.update.title'),
                trans('roles.alert.update.message.error', ['error' => $th->getMessage()]),
            );
            
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();

        try {
            $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
            $role->delete();
            
            Alert::success(
                trans('roles.alert.delete.title'),
                trans('roles.alert.delete.message.success'),
            );
            
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('roles.alert.delete.title'),
                trans('roles.alert.delete.message.error', ['error' => $th->getMessage()]),
            );
            
        } finally {
            DB::commit();
        }

        return redirect()->route('roles.index');
    }

    private function attributes()
    {
        return [
            'name' => trans('roles.form_control.input.name.attribute'),
            'permissions' => trans('roles.form_control.input.permission.attribute'),
        ];
    }
}
