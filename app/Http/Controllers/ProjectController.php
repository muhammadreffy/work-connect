<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\StoreProjectRequest;
use App\Http\Requests\Projects\StoreToolRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectTool;
use App\Models\Tool;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $projectsQuery = Project::with(['category', 'applicants'])->orderByDesc('id');

        if ($user->hasRole('client')) {
            //filtering berdasarkan dari client id == user id
            $projectsQuery->whereHas('owner', function ($query) use ($user) {
                $query->where('client_id', $user->id);
            });
        }

        $projects = $projectsQuery->paginate(10);

        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        $user = Auth::user();
        $balance = $user->wallet->balance;

        if ($request->input('budget') > $balance) {
            return redirect()->back()
                ->with('balanceInsufficient', 'Your balance is insufficient');
        }

        try {

            DB::beginTransaction();

            $user->wallet->decrement('balance', $request->input('budget'));

            $projectWalletTransaction = WalletTransaction::create([
                'type' => 'Project Cost',
                'amount' => $request->input('budget'),
                'is_paid' => true,
                'user_id' => $user->id,
            ]);

            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $validated['has_started'] = false;
            $validated['has_finished'] = false;
            $validated['client_id'] = $user->id;

            Project::create($validated);

            DB::commit();

            return redirect()->route('admin.projects.index')
                ->with('successProjectAdded', 'The latest project has been successfully added');
        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('admin.projects.index')
                ->with('failedToAddProject', 'The latest project has been successfully added');
        }
    }

    public function manage(Project $project)
    {
        return view('dashboard.projects.manage', compact('project'));
    }

    public function manage_tools(Project $project)
    {

        $user = Auth::user();
        if ($project->client_id != $user->id) {
            return view('middleware.403');
        }

        $tools = Tool::all();

        return view('dashboard.projects.manage_tools', compact('project', 'tools'));
    }

    public function tools_store(StoreToolRequest $request, Project $project)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {

            $validated['project_id'] = $project->id;

            ProjectTool::firstOrCreate($validated);

            DB::commit();

            return redirect()->back()
                ->with('successAddTool', 'Successfully added a tool to this project.');

        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('admin.project.manage-tools', $project->slug)
                ->with('failedAddTool', 'Failed to add a tool to this project');
        }
    }
}
