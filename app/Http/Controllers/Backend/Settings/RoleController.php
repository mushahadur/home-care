<?php

namespace App\Http\Controllers\Backend\Settings;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Settings\RoleStoreRequest;

class RoleController extends Controller
{
     /**
     * Check the middleware for permissions.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function __construct()
    // {
    //     $this->middleware('permission:roles-list')->only('index');
    //     $this->middleware('permission:roles-create')->only(['create','store']);
    //     $this->middleware('permission:roles-edit')->only(['edit','update']);
    //     $this->middleware('permission:roles-destroy')->only('destroy');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $roles = Role::with('permissions')->orderBy('id', 'DESC')->paginate(5);
        // Prepare group-wise permissions for each role
        $roles->transform(function ($role) {
            $groupedPermissions = $role->permissions
                ->groupBy('group_name'); // according to group_name categorize

            $role->grouped_permissions = $groupedPermissions;
            return $role;
        });
        // dd($roles);
        return view('backend.pages.settings.roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $groupedPermissions = Permission::all()->groupBy('group_name');
        $rolePermissions = []; // no permissions yet

        return view('backend.pages.settings.roles.create', compact(
            'groupedPermissions',
            'rolePermissions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request): RedirectResponse
    {
        // dd($request->all());
        // 2️⃣ Cast permission IDs to integers (optional but safe)
        $permissionsID = array_map('intval', $request->input('permissions', []));
        // dd($permissionsID);
        // 3️⃣ Create role
        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'web',
        ]);
        // 4️⃣ Assign permissions
        $role->syncPermissions($permissionsID);
        // dd($role);

        // 5️⃣ Redirect with success
        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('backend.pages.settings.roles.show', compact('role'));

        // return view('backend.pages.settings.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        // 1️⃣ Get the role
        $role = Role::findOrFail($id);

        // 2️⃣ Get all permissions grouped by 'group_name'
        $groupedPermissions = Permission::all()->groupBy('group_name');

        // 3️⃣ Get assigned permission IDs for this role
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        // 4️⃣ Return to Blade view
        return view('backend.pages.settings.roles.edit', compact(
            'role',
            'groupedPermissions',
            'rolePermissions'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request->all());
        // 1️⃣ Validate input
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id, // ignore current role
            'permissions' => 'required|array',
        ]);

        // 2️⃣ Find role
        $role = Role::findOrFail($id);

        // 3️⃣ Update role name
        $role->name = $request->input('name');
        $role->save();

        // 4️⃣ Sync selected permissions
        $permissionsID = array_map('intval', $request->input('permissions', []));
        $role->syncPermissions($permissionsID);

        // 5️⃣ Redirect with success message

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        // dd($id);
        Role::find($id)->delete();
        return redirect()->route('admin.roles.index')
            ->with('success', 'role deleted successfully');
    }
}
