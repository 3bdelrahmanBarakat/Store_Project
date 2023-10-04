<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Categories\CategoryDeleteRequest;
use App\Http\Requests\Dashboard\Categories\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Categories\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryService;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $mainCategories = $this->categoryService->getMainCategories();
        return view('dashboard.categories.index')->with([
            'mainCategories'=> $mainCategories,

        ]);
    }

    public function getall()
    {
        return $this->categoryService->datatable();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->categoryService->store($request->validated());
        return redirect()->route('dashboard.categories.index')->with('success', 'تمت الاضافه بنجاح');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categoryService->getById($id,true);
        $mainCategories = $this->categoryService->getMainCategories();
        return view('dashboard.categories.edit', compact('category','mainCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->categoryService->update($id,$request->validated());
        return redirect()->route('dashboard.categories.edit', $id)->with('success', 'تم التعديل بنجاح');
    }


    public function delete(CategoryDeleteRequest $request)
    {
        $this->categoryService->delete($request->validated());

        return redirect()->route('dashboard.categories.index')->with('success', 'تمت الحذف بنجاح');
    }
}
