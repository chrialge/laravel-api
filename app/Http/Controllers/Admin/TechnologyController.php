<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', ['technologies' => Technology::orderByDesc('id')->paginate(6)]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($val_data['name'], '-');

        Technology::create($val_data);

        $name = $val_data['name'];

        return to_route('admin.technologies.index')->with('message', "You created new project: $name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $technology->update($val_data);

        return to_route('admin.technologies.index')->with('message', "You updated project: $technology->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->back()->with('message', "You delete  project: $technology->name");
    }
}
