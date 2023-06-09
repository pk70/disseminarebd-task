<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use App\Models\ApplicantTrainingInfos;
use App\Models\Districts;
use App\Models\Divisions;
use App\Models\Thanas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return view(
            'registration',
            [
                'divisions' => Divisions::all(),
                'exam'=>['M.SC','B.SC','HSC','SSC'],
                'university'=>['Jagannath University','Dhaka University','AIUB','BUET'],
                'board'=>['Dhaka','Rajshahi','Comilla','Barishal'],
            ]
        );
    }
    public function store(Request $request)
    {
        parse_str($request->formData['exam'], $exam);
        parse_str($request->formData['university'], $university);
        parse_str($request->formData['board'], $board);
        parse_str($request->formData['training_name'], $training_name);
        parse_str($request->formData['training_details'], $training_details);
        parse_str($request->formData['language_check'], $language_check);

        $validator = Validator::make(
            $request->formData,
            [
                'name' => 'required|string',
                'email' => 'required|email:rfc,dns|unique:applicants',
                'division' => 'required|int',
                'district' => 'required|int',
                'thana' => 'required|int',
                'address_details' => 'required|string',
                'training_enable' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 20015,
                    'message' => 'Please add valid information',
                    'details' => $validator->errors()
                ],
            ]);
        }
        //$rt=implode(",",$training_details['training_details']);
      //  print_r(json_encode($training_details['training_details']));exit;
       $applicants=Applicants::create([
        'applicant_name'=>$request->formData['name'],
        'email'=>$request->formData['email'],
        'address_details'=>$request->formData['address_details'],
        'has_training'=>$request->formData['training_enable'],
        'id_division'=>$request->formData['division'],
        'id_district'=>$request->formData['district'],
        'id_thana'=>$request->formData['thana'],
        'programming_language'=>$language_check,
       ]);
       if($request->formData['training_enable']=='yes'){
        foreach ($training_name['training_name'] as $key => $value) {
            ApplicantTrainingInfos::create([
                'id_applicant'=>$applicants->id,
                'training_name'=>$value,
                'details'=>$training_details['training_details'][$key],
            ]);
        }

       }
       dd();
      //dd($applicants->id);
    }
    public function getDistrict($id = null)
    {
        $data = [];
        $data = Districts::where('id_division', $id)->get();
        return response()->json(['data' => $data, 'status' => 'success']);
    }
    public function getThanas($id = null)
    {
        $data = [];
        $data = Thanas::where('id_district', $id)->get();
        return response()->json(['data' => $data, 'status' => 'success']);
    }
}
