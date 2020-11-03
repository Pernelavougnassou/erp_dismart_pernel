<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Demande;
use App\Models\Departement;
use App\Models\Niveau_Importance;
use App\Models\Projet;
use App\Models\Projet_User;
use App\Models\Type_Demande;
use App\Models\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ListedemandeController extends Controller
{
    public function index (Request $request) {

        $projet_users = Projet_User::where('user_id', auth()->user()->id)->first();
        $demandes = Demande::where('projet_user_id', $projet_users->id)->get();

        /*
        if (empty($demande)) {
            Flash::error('Demande not found');

            return view('espaceclients.errorpage');
        }
        */

        $departements = Departement::all();
        $niveau_importances = Niveau_Importance::all();
        $type_demandes = Type_Demande::all();
        $projets = Projet::all();
        $contrats = Contrat::all();
        $users = User::all();

        return view('espaceclients.liste_demandes',compact(['departements', 'niveau_importances', 'type_demandes', 'users', 'projets', 'projet_users', 'contrats']))
            ->with('demandes', $demandes);
    }
}
