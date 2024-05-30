<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectControler extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();
        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }
}
