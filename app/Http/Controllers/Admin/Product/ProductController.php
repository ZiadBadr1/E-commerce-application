<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Service\ProductService;

class ProductController extends Controller
{

    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::get(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        $this->productService->create($request->validated());
        return redirect()->back()->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'categories' => Category::get(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update($request->validated(), $product);
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function getSubCategories($id)
    {
//        dd($this->productService->getSubCategory($id));
//        response()->json
        return response()->json($this->productService->getSubCategory($id));
    }

}
