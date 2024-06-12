<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\Admin\Project\StoreProjectRequest;
use App\Http\Requests\Admin\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->admin_super()) {
            // dd(auth()->user()->admin_super());
            return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(8)]);
        }

        return view('admin.projects.index', ['projects' => Project::where('user_id', Auth::id())->orderByDesc('id')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        $collaborators = Collaborator::all();
        return view('admin.projects.create', compact('types', 'technologies', 'collaborators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());
        // dd(Auth::user());
        $val_data = $request->validated();
        // dd($val_data);


        // dd($val_data);
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        $name = $val_data['name'];
        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::disk('public')->put('uploads/images', $val_data['cover_image']);
        }
        if ($request->has('video')) {
            $val_data['video'] = Str::of($val_data['video'])->after('https://www.youtube.com/watch?v=');
        }


        // dd($val_data);
        $val_data['user_id'] = Auth::id();
        //dd($val_data);
        // dd($val_data['cover_image']);
        // dd($val_data['slug'], $val_data);
        $project = Project::create($val_data);


        if ($val_data['note_name'] && $val_data['note_content']) {

            $newNote['name'] = $val_data['note_name'];
            $newNote['content'] = $val_data['note_content'];
            $newNote['slug'] = Str::slug($newNote['name'], '-');
            $newNote['project_id'] = $project->id;
            $note = Note::create($newNote);
            $project['note_id'] = $note->id;
        }

        if ($request->has('collaborators')) {
            $project->collaborators()->attach($val_data['collaborators']);
            dd($project);
        }

        if ($request->has('technologies')) {

            $project->technologies()->attach($val_data['technologies']);
        }
        // dd($project);
        return to_route('admin.projects.index')->with('message', "You created new project: $name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        if (Auth::id() === $project->user_id || auth()->user()->admin_super()) {
            $id_technologies = $project->technologies;

            $id_tech = [];
            foreach ($id_technologies as $id) {
                array_push($id_tech, $id->id);
            }


            $technologies = Technology::all();
            $types = Type::all();

            return view('admin.projects.edit', compact('project', 'technologies', 'types', 'id_tech'));
        }
        abort(403, "Don't try mess up with other user project");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request->all());

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        // dd($val_data);
        if ($request->has('cover_image')) {

            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $val_data['cover_image'] = Storage::disk('public')->put('uploads/images', $val_data['cover_image']);
        }

        if ($request->has('video')) {

            $val_data['video'] = Str::of($val_data['video'])->after('https://www.youtube.com/watch?v=');
        }

        // dd($project['cover_image'], $project->cover_image);
        $project->update($val_data);

        if ($request->has('technologies')) {

            $project->technologies()->sync($val_data['technologies']);
        } else {
            $project->technologies()->detach();
        }
        return to_route('admin.projects.index', $project)->with('message', "You updated project: $project->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        if ($project->video) {
            Storage::disk('public')->delete($project->video);
        }
        $project->delete();
        return redirect()->back()->with('message', "You delete  project: $project->name");
    }
}
