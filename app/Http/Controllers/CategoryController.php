<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::orderBy('name');

        if ($search != '') {
            $categories->where('name', 'like', '%' . $search . '%');
        }

        $categories = $categories->get();

        return view('dashboard.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            Category::create($validated);

            DB::commit();

            return redirect()->route('admin.categories.index')
                ->with('successAddedCategory', 'Successfully added a new category');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.categories.index')
                ->with('failedAddCategory', 'Failed to add a new category');
        }
    }

    public function edit(Category $category)
    {
        return view('dashboard.admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {

            if ($request->hasFile('icon')) {
                if ($category->icon) {
                    Storage::disk('public')->delete($category->icon);
                }

                $iconPath = $request->file('icon')->store('icons', 'public');

                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $category->update($validated);

            DB::commit();

            return redirect()->route('admin.categories.index')
                ->with('successUpdatedCategory', 'Successfully updated category data');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.categories.index')
                ->with('failedToUpdateCategory', 'Failed to update category data');
        }
    }

    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {

            $category->delete();

            DB::commit();

            return redirect()->route('admin.categories.index')
                ->with('successDeletedCategory', 'Successfully deleted category data');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.categories.index')
                ->with('failedToDeleteCategory', 'Failed to delete category data');
        }
    }
}
