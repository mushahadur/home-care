<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareService;
use App\Http\Requests\Pages\CareServicesRequest;

class CareServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $care_services = CareService::latest()->paginate(5);
        // dump($care_services->toArray());
        return view('backend.pages.care-services.index', compact('care_services'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.care-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CareServicesRequest $request)
    {
        // Get all validated data
        $data = $request->validated();
        // Handle single FileImage upload
        if ($request->hasFile('care_services_image')) {
            $data['care_services_image'] = $this->uploadFileImage($request->file('care_services_image'));
        }
        // Create the record
        // dd($data);

        $careService = CareService::create($data);

        // Redirect or show the Blade view
        return redirect()
            ->route('admin.care-services.index')
            ->with('success', 'Care service created successfully!');
    }

/**
 * Upload single File Image
 */
    protected function uploadFileImage($file)
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('assets/admin/images/care_services');
        // Create directory if not exists
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        // Move file
        $file->move($path, $filename);
        return 'assets/admin/images/care_services/' . $filename;
    }



 /**
 * Display the specified resource.
 */
public function show(string $id)
{
    $careService = CareService::findOrFail($id);

      // Add full image URL
    if ($careService->care_services_image) {
        $careService->care_services_image = asset($careService->care_services_image);
    }
    if (request()->ajax()) {
        return response()->json([
            'success' => true,
            'data' => $careService
        ]);
    }

    return view('backend.pages.care-services.show', compact('careService'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $care_service = CareService::findOrFail($id);
        return view('backend.pages.care-services.edit', compact('care_service'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CareServicesRequest $request, string $id)
    {
        // Find the existing care service
        $careService = CareService::findOrFail($id);

        // Get all validated data
        $data = $request->validated();

        // Handle single thumbnail upload (replace if new file uploaded)
        if ($request->hasFile('care_services_image')) {
            // Optional: delete old thumbnail
            if ($careService->care_services_image && file_exists(public_path($careService->care_services_image))) {
                unlink(public_path($careService->care_services_image));
            }

            $data['care_services_image'] = $this->uploadFileImage($request->file('care_services_image'));
        }

        // Update the record
        $careService->update($data);

        // Redirect with success message
        return redirect()
            ->route('admin.care-services.index')
            ->with('success', 'Care service updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CareService::find($id)->delete();
        // return response()->json(['message' => 'Product delete successfully'], 200);
        return redirect()->route('admin.care-services.index')
            ->with('success', 'Services deleted successfully');
    }
}
