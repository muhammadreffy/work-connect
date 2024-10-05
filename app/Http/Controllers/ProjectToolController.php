<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectTool;
use Illuminate\Support\Facades\DB;

class ProjectToolController extends Controller
{
    public function destroy(ProjectTool $projectTool, Project $project)
    {
        DB::beginTransaction();

        try {
            $projectTool->delete();

            DB::commit();

            return redirect()->back()
                ->with('successRemoveTool', 'Successfully removed a tool from this project');

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('failedToRemoveTool', 'Failed to remove a tool from this project');

        }
    }
}
