<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;

class EspaceclientController extends Controller
{
    public function index (Request $request) {
        return view('espaceclients.index');
    }
}
