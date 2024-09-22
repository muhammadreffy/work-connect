<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tools\StoreToolRequest;
use App\Http\Requests\Tools\UpdateToolRequest;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        $tools = Tool::orderBy('name');

        $search = $request->input('search');

        if ($search != '') {
            $tools->where('name', 'like', '%' . $search . '%');
        }

        $tools = $tools->get();

        return view('dashboard.admin.tools.index', compact('tools'));
    }

    public function create()
    {
        return view('dashboard.admin.tools.create');
    }

    public function store(StoreToolRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $slug = Str::slug($validated['name']);

            $slugCheck = Tool::where('slug', 'like', "$slug%")->count();

            if ($slugCheck > 0) {
                $slug = "{$slug}-" . ($slugCheck + 1);
            }

            $validated['slug'] = $slug;

            Tool::create($validated);

            DB::commit();

            return redirect()->route('admin.tools.index')
                ->with('successAddedTool', 'Successfully added a new tool');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.tools.index')
                ->withErrors('failedAddTool', 'Failed to add new category');
        }
    }

    public function edit(Tool $tool)
    {
        return view('dashboard.admin.tools.edit', compact('tool'));
    }

    public function update(UpdateToolRequest $request, Tool $tool)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {
            if ($request->hasFile('icon')) {
                if ($tool->icon) {
                    Storage::disk('public')->delete($tool->icon);
                }

                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            if ($validated['name'] !== $tool->name) {
                $slug = Str::slug($validated['name']);

                $slugCheck = Tool::where('slug', 'like', "$slug%")
                    ->where('id', '!=', $tool->id)->count();

                if ($slugCheck > 0) {
                    $slug = "{$slug}-" . ($slugCheck + 1);
                }

                $validated['slug'] = $slug;
            } else {
                $validated['slug'] = $tool->slug;
            }

            $tool->update($validated);

            DB::commit();

            return redirect()->route('admin.tools.index')
                ->with('successUpdatedTool', 'Successfully updated tool data');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.categories.index')
                ->with('failedToUpdateTool', 'Failed to update tool data');
        }
    }

    public function destroy(Tool $tool)
    {
        DB::beginTransaction();

        try {

            $tool->delete();

            DB::commit();

            return redirect()->route('admin.tools.index')
                ->with('successDeletedTool', 'Successfully deleted tool data');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.tools.index')
                ->with('failedToDeleteTool', 'Failed to delete tool data');
        }
    }
}
