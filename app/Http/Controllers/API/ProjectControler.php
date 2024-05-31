<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectControler extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->orderByDesc('id')->paginate(6);
        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }

    public function latest()
    {
        $projects = Project::with('type', 'technologies')->orderByDesc('id')->take(4)->get();
        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }
}
