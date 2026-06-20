<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allPermissions = Permission::all();

        $groupedPermissions = $allPermissions->groupBy(function ($permission) {
            return explode('-', $permission->name)[0];
        });

        $perPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page');

        $currentPageItems = $groupedPermissions->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $permissions = new LengthAwarePaginator(
            $currentPageItems,
            $groupedPermissions->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('backend.pages.settings.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.settings.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'group_name' => 'required|string|max:50',
            'actions'    => 'required|array|min:1',
        ]);

        // sanitize group name
        $group = strtolower($request->group_name);
        $group = str_replace(' ', '-', $group);

        foreach ($request->actions as $action) {

            $permissionName = $group . '-' . strtolower($action);

            Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'web',
            ], [
                'group_name' => $group,
            ]);
        }

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permissions created successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = \Spatie\Permission\Models\Permission::findOrFail($id);

        $groupName = $permission->group_name;

        // This group of all permissions
        $groupPermissions = \Spatie\Permission\Models\Permission::where('group_name', $groupName)->get();

        // Just extract the actions (orders-list → list)
        $selectedActions = $groupPermissions->pluck('name')->map(function ($name) {
            return explode('-', $name)[1];
        })->toArray();

        return view('backend.pages.settings.permissions.edit', compact('permission', 'groupName', 'selectedActions', 'groupPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'group_name' => 'required|string|max:50',
            'actions'    => 'required|array|min:1',
        ]);

        $permission = Permission::findOrFail($id);

        $oldGroup = $permission->group_name;
        $newGroup = strtolower($request->group_name);

        //  Delete old group permissions
        Permission::where('group_name', $oldGroup)->delete();

        //  Create new permissions
        foreach ($request->actions as $action) {
            Permission::firstOrCreate([
                'name' => $newGroup . '-' . $action,
                'guard_name' => 'web',
                'group_name' => $newGroup,
            ]);
        }

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permissions updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}
