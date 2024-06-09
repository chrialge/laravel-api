<?php

namespace App\Http\Controllers\Admin;

use App\Models\Note;
use App\Http\Requests\Admin\Note\StoreNoteRequest;
use App\Http\Requests\Admin\Note\UpdateNoteRequest;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.notes.index', ['notes' => Note::orderByDesc('id')->paginate(6), 'projects' => Project::orderByDesc('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.notes.create', ['projects' => Project::orderByDesc('id')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        Note::create($val_data);
        $name = $val_data['name'];
        return to_route('admin.notes.index')->with('message', "You create project: $name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('admin.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {

        $projects = Project::orderByDesc('id')->get();
        return view('admin.notes.edit', compact('note', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $note->update($val_data);
        return to_route('admin.notes.index')->with('message', "You update project: $note->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->back()->with('message', "You delete project: $note->name");
    }
}
