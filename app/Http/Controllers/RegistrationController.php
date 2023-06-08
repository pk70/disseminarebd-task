<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use App\Models\Divisions;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return view(
            'registration',
            [
                'divisions' => Divisions::all()
            ]
        );
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function getDistrict($id = null)
    {
        $data = [];
        $data = Districts::where('id_division', $id)->get();
        return response()->json(['data' => $data, 'status' => 'success']);
    }
}
