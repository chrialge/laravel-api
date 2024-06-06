<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMessegeMd;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use function Pest\Laravel\json;

class LeadController extends Controller
{
    //
    public function store(Request $request)
    {
        // variabile che recupera i dati dalla front end
        $data = $request->all();

        // li controlla con validator
        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);

        // se la validazione fallisce
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // creo un nuovo lead
        // $newLead = new Lead();
        // $newLead->fill($data);
        // $newLead->save();

        $newLead = Lead::create($data);

        Mail::to('admin@boolfolio.com')->send(new NewLeadMessegeMd($newLead));

        $name =  $newLead['first_name'] .  ' ' . $newLead['last_name'];
        return response()->json([
            'success' => true,
            'message' => "Compliment! Your contacts $name are sending successfull"
        ]);
    }
}
