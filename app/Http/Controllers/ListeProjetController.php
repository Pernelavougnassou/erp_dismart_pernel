<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Projet;
use App\Models\Projet_User;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ListeProjetController extends Controller
{
    public function index (Request $request) {

        $user = User::where('id', auth()->user()->id)->first();
        $projet_users = Projet_User::where('user_id', $user->id)->get();
        $projet_users = Projet_User::where('user_id', $user->id)->get();

        $projets = Projet::all();
        $clients = Client::all();
        $services = Service::all();

        return view('espaceclients.liste_projets',compact(['clients', 'services']))
            ->with('projets', $projets);
    }

}
