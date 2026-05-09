<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $permissions = Permission::select('group_name', 'name', 'created_at')->get()->groupBy('group_name');
        // dd($permissions);
         $permissions = Permission::all()->groupBy(function($permission) {
            return explode('-', $permission->name)[0];
        });
        
        // Filter out any groups that don't have a valid ID
        $permissions = $permissions->filter(function($group) {
            return $group->first() !== null;
        });
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
         $request->validate([
        'group_name' => 'required|string|max:50',
        'actions'    => 'required|array|min:1',
    ]);

    $group = strtolower($request->group_name);

    foreach ($request->actions as $action) {
        Permission::firstOrCreate([
            'name' => $group . '-' . $action,
            'guard_name' => 'web',
            'group_name' => $group,
        ]);
    }

    return redirect()->route('permissions.index')->with('success', 'Permissions created successfully ✅');
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

        // 1️⃣ Delete old group permissions
        Permission::where('group_name', $oldGroup)->delete();

        // 2️⃣ Create new permissions
        foreach ($request->actions as $action) {
            Permission::firstOrCreate([
                'name' => $newGroup . '-' . $action,
                'guard_name' => 'web',
                'group_name' => $newGroup,
            ]);
        }

        return redirect()->route('permissions.index')
            ->with('success', 'Permissions updated successfully ✅');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }
}
