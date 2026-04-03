<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::latest()->paginate(5);
        return view('backend.pages.products.index', compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    private function saveImage($request)
    {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $extension;
        $directory = 'product-images/';
        $image->move(public_path($directory), $imageName);

        return $directory . $imageName;
    }

    public function store(ProductRequest $request)
    {
        // Step 1: Handle image upload
        $imagePath = $this->saveImage($request);
        // Step 2: Create product
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $imagePath;
        $product->save();

        return response()->json(['message' => 'Product created successfully'], 200);
        // return redirect()->route('products.index')->with('success','Product created successfully');
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
    public function edit(Product $product)
    {
        if (request()->wantsJson()) {
            return response()->json(['product' => $product]);
        }
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            // 
            if ($product->image) {
                $oldImagePath = public_path($product->image);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
            }
    
            $imagePath = $this->saveImage($request);
            $product->image = $imagePath;
        }
    
        // Step 2:
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
    
        $product->save();
    
        // Response
        return response()->json(['message' => 'Product updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        // return response()->json(['message' => 'Product delete successfully'], 200);
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
