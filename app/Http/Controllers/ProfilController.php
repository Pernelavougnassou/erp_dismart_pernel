<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', Auth::user()->id)->get();

        return view ('profils.index', compact('users'));
    }

    public function showeditprofil(Request $request) {
        return view('profils.editerprofil');
    }

    public function editprofil (Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        $users = User::pluck('nom');

        return view('profils.editerprofil', compact(['user', 'users']));
    }
}
