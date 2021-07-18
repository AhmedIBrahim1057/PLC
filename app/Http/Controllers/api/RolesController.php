<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use App\Model\User;
use App\Model\Log;

class RolesController extends Controller
{
    public $successStatus = 200;

    private static function permissionsGroups() {

        $permissions = Permission::select('id', 'name')->orderBy('name')->pluck('name', 'id')->toArray();

        $permissionsGroups = [];
        foreach ($permissions as $id => $name) {
            $friendly_name = ucwords(str_replace('_', ' ', $name));
            $sections = explode(' ', $friendly_name);
            $group_name = end($sections);
            $permissionsGroups[$group_name][$id] = $friendly_name;
        }

        return $permissionsGroups;
    }

    public function index(Request $request) {

//        if(!can('access_roles')) return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);

        $roles = Role::select('id', 'name')->orderBy('name')->pluck('name', 'id')->toArray();

        $permissions = Permission::select('id', 'name')->orderBy('name')->pluck('name', 'id')->toArray();

        $permissionsGroups = RolesController::permissionsGroups();

        return response()->json(['roles' => $roles, 'permissions' => $permissions, 'permissions_groups' => $permissionsGroups], $this->successStatus);
    }

    public function get(Request $request, Role $role) {

//        if(!can('show_roles')) return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);

        $permissions = $role->permissions()->pluck('name', 'id')->toArray();

        return response()->json(['permissions' => $permissions], $this->successStatus);
    }

    public function put(Request $request, Role $role = null) {

//        if(!can('edit_roles')) return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);

        $validator = Validator::make($request->all(),[
            "name"=>"required|unique:roles".(($role)?",id,$role->id":""),
        ]);

        if($validator->fails())
            return response()->json(['error'=>$validator->errors()->all()]);

        $old = null;
        if(empty($role)) {
            $role = new Role();
        }
        else {
            $old = $role->getAttributes();
        }

        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        $role->refresh();
        $role->syncPermissions($request->permissions);

        Artisan::call('cache:clear');

        Log::log('ROLES PUT', $role, $old, $role->getAttributes());

        $success["id"] = $role->id;

        return response()->json(['success' => $success], $this->successStatus);
    }

    public function delete(Request $request, Role $role) {

//        if(!can('edit_roles')) return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);
//
//        if($role->users()->count()>0) return error(System::ERROR_ITEM_NOT_EMPTY, 401);

        $old = $role->getAttributes();

        $role->delete();

        Artisan::call('cache:clear');

        Log::log('ROLES DELETE', $role, $old);

        return success();
    }

    public function user(Request $request, User $user) {

//        if(!canAll(['show_roles']))
//            return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);

        if (Auth::user()->isRequired() && !can('admin_users')){
            return response()->json(['roles' => [], 'role_permissions' => [], 'direct_permissions' => []], $this->successStatus);
        }

        $roles = $user->roles()->pluck('name', 'id')->toArray();
        $rolePermissions = $user->getPermissionsViaRoles()->pluck('name', 'id')->toArray();
        $directPermissions = $user->getDirectPermissions()->pluck('name', 'id')->toArray();

        return response()->json(['roles' => $roles, 'role_permissions' => $rolePermissions, 'direct_permissions' => $directPermissions], $this->successStatus);
    }

    public function sync(Request $request, User $user) {

//        if(!canAll(['show_roles', 'edit_users']))
//            return error(System::ERROR_INSUFFICIENT_PRIVILEGES, 401);

        $user->syncPermissions($request->permissions);
        $user->syncRoles($request->roles);

        Artisan::call('cache:clear');

        Log::log('ROLES USER SYNC', $user, null, $request->all());

        return success();
    }
}
