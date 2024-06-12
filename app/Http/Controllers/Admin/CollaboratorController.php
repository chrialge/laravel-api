<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Collaborator\StoreCollaboratorRequest;
use App\Http\Requests\Admin\Collaborator\UpdateCollaboratorRequest;
use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use Illuminate\Support\Str;

use function Pest\Laravel\delete;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.collaborators.index', ['collaborators' => Collaborator::orderByDesc('id')->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.collaborators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecollaboratorRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $collaborator = Collaborator::create($val_data);
        return to_route('admin.collaborators.index')->with('message', "Create your collaborator: $collaborator->name ");
    }

    /**
     * Display the specified resource.
     */
    public function show(collaborator $collaborator)
    {

        return view('admin.collaborators.show', compact('collaborator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(collaborator $collaborator)
    {
        return view('admin.collaborators.edit', compact('collaborator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecollaboratorRequest $request, collaborator $collaborator)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $collaborator->update($val_data);
        return to_route('admin.collaborators.index')->with('message', "Update your collaborator on: $collaborator->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(collaborator $collaborator)
    {
        $collaborator->delete();

        return redirect()->back()->with('message', "delete your collaborator: $collaborator->name");
    }
}
