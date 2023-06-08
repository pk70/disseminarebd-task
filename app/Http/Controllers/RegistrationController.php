<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
       return view('registration',
       [
        'divisions'=>Divisions::all()
       ]
    );
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
