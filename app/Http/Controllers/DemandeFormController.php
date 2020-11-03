<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeFormController extends Controller
{
    // Create Demande Form
    public function index (Request $request)
    {
        return view('espaceclients.demandeform');
    }

    // Store Demande Form data
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storedemandeform (Request $request)
    {
        // Form validation
        $this->validate($request, [
            'objet' => 'required',
            'departement_id' => 'required',
            'projet_user_id' => 'required',
            'message' => 'required',
            'niveau_importance_id' => 'required',
            'type_demande_id' => 'required',
            'statut' => 'required',
            'responsable' => 'required',
            'date_fermeture' => 'required'
        ]);
        //  Store data in database
        Demande::create($request->all());
        //
        return back('espaceclients.liste_demandes')->with('success', 'Vous avez ajouté une nouvelle demande.');
    }
}
