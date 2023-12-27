<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryServices;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request,CategoryServices $categoryServices)
    {
        $categoryServices->store(
            $request->validated()
        );
        return redirect()->back()->with(['success' => 'Category created']);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(StoreCategoryRequest $request, Category $category,CategoryServices $categoryServices)
    {
        $categoryServices->update(
            $category,
            $request->validated()
        );
        return redirect()->route('categories.index')->with(['success' => 'Category updated']);
    }

    public function destroy(Category $category,CategoryServices $categoryServices)
    {
        $categoryServices->destroy($category);
        return response('Field deleted');
    }
}
