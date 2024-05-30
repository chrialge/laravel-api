<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.types.index', ['types' => Type::orderByDesc('id')->paginate(6)]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $val_data = $request->validated();
        $name = $val_data['name'];
        // dd($val_data);
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        // dd($val_data);
        Type::create($val_data);
        return to_route('admin.types.index')->with('message', "You created new project: $name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {

        return view('admin.types.show', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $type->update($val_data);
        return to_route('admin.types.index', $type)->with('message', "You updated project: $type->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->with('message', "You delete  type: $type->name");;
    }
}
