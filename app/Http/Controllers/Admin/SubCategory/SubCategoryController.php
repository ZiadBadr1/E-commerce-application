<?php

namespace App\Http\Controllers\Admin\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Service\subCategoryService;

class SubCategoryController extends Controller
{
    protected SubCategoryService $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }


    public function index()
    {
        $subCategories = $this->subCategoryService->getAll();
        return view('admin.sub-category.index', compact('subCategories'));
    }

    public function create()
    {
        return view('admin.sub-category.create',
        ["categories" => Category::all()],
        );
    }

    public function store(SubCategoryRequest $request)
    {
        $this->subCategoryService->create($request->validated());
        return redirect()->back()->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        return view('admin.sub-category.edit',
            [
                'subCategory' => $subCategory,
                "categories" => Category::all(),
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        $this->subCategoryService->update($request->validated(), $subCategory);
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $this->subCategoryService->delete($subCategory);
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
