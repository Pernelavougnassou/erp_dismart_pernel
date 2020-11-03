<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Projet_User;
use App\Models\User;

use Illuminate\Http\Request;

class EquipeprojetController extends Controller
{
    public function index (Request $request) {

        $user = User::where('id', auth()->user()->id)->first();
        $equipeprojets = Projet_User::where('user_id', $user->id)->get();

        $projets = Projet::all();
        $users = User::all();

        return view('espaceclients.equipe_projet',compact(['user', 'projets', 'users']))
            ->with('equipeprojets', $equipeprojets);
    }
}
