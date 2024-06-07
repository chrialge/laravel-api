<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadMessegeMd;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\API\StoreLeadRequest;

use function Pest\Laravel\json;

class LeadController extends Controller
{
    //
    public function store(StoreLeadRequest $request)
    {
        // variabile che recupera i dati dalla front end


        // li controlla con validator
        $val_data = $request->validated();
        dd($val_data);

        // se la validazione fallisce
        if ($val_data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $val_data->errors(),
            ]);
        }

        // creo un nuovo lead
        // $newLead = new Lead();
        // $newLead->fill($data);
        // $newLead->save();

        $newLead = Lead::create($val_data);

        Mail::to('admin@boolfolio.com')->send(new NewLeadMessegeMd($newLead));

        $name =  $newLead['first_name'] .  ' ' . $newLead['last_name'];
        return response()->json([
            'success' => true,
            'message' => "Compliment! Your contacts $name are sending successfull"
        ]);
    }
}
