<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
    public function store(Request $request)
    {
        dd($request->all());
    }
}
