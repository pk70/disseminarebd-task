<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Thanas;
use App\Models\Districts;
use App\Models\Divisions;
use App\Models\Applicants;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ApplicantFiles;
use App\Models\ApplicantTrainingInfos;
use App\Models\ApplicantEducationalInfos;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    protected $per_page = 10;

    public function index(Request $request)
    {
        return view(
            'registration',
            [
                'divisions' => Divisions::all(),
                'exam' => ['M.SC', 'B.SC', 'HSC', 'SSC'],
                'university' => ['Jagannath University', 'Dhaka University', 'AIUB', 'BUET'],
                'board' => ['Dhaka', 'Rajshahi', 'Comilla', 'Barishal'],
            ]
        );
    }

    public function destroy($id)
    {
        Applicants::where('id', $id)->delete();

        $applicant_data = Applicants::with(['trainingInfo', 'educationalInfo']);

        $applicant_data = $applicant_data->paginate($this->per_page);

        return view(
            'applicant-list',
            [
                'applicant_data' => $applicant_data,

            ]
        );
    }
    public function list(Request $request)
    {

        $applicant_data = Applicants::with(['trainingInfo', 'educationalInfo', 'files']);

        $division = new Divisions;
        $distric = new Districts;
        $thana = new Thanas;
        if ($request->ajax()) {
            $data = Applicants::select('*');
            return Datatables::of($applicant_data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route("delete-applicant", ["id" => $row->id]) . '" class="edit btn btn-success btn-sm">Delete</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Edit</a>';
                    return $actionBtn;
                })
                ->addColumn('division', function ($row) use ($division) {
                    return $division::where('id', $row->id_division)->pluck('name')->first();
                })
                ->addColumn('district', function ($row) use ($distric) {
                    return $distric::where('id', $row->id_division)->pluck('name')->first();
                })
                ->addColumn('thana', function ($row) use ($thana) {
                    return $thana::where('id', $row->id_division)->pluck('name')->first();
                })
                ->addColumn('list_edu', function ($row) {
                    $array = [];

                    foreach ($row->educationalInfo as $key => $value) {

                        $array[] = array('name' => $value->exam_name, 'university' => $value->university, 'board' => $value->university, 'result' => $value->result);
                    }
                    return json_encode($array);
                })
                ->addColumn('list_training', function ($row) {
                    $array2 = [];

                    foreach ($row->trainingInfo as $key => $value) {

                        $array2[] = array('name' => $value->training_name, 'details' => $value->details);
                    }
                    return json_encode($array2);
                })
                ->addColumn('files', function ($row) {
                    $array3 = [];

                    foreach ($row->files as $key3 => $value3) {

                        $array3[] = array('path' => $value3->path, 'file_name' => $value3->file_name);
                    }
                    return json_encode($array3);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('applicant-list');
    }
    public function store(Request $request)
    {

        $request->exam = array_filter($request->exam);
        $request->university = array_filter($request->university);
        $request->board = array_filter($request->board);
        $request->result = array_filter($request->result);
        $request->training_name = array_filter($request->training_name);
        $request->training_name = array_filter($request->training_name);
        $request->language_check = array_filter($request->language_check);

        $validator = Validator::make(
            $request->all(),
            [
                'applicant_name' => 'required|string',
                'email' => 'required|email:rfc,dns|unique:applicants',
                'division' => 'required|int',
                'district' => 'required|int',
                'thana_upo' => 'required|int',
                'address_details' => 'required|string',
                'training_enable' => 'nullable|string',
                'exam.*' => 'required|string',
                'university.*' => 'required',
                'board.*' => 'required',
                'result.*' => 'required',
                'training_name.*' => 'required_if:training_enable,yes',
                'training_details.*' => 'required_if:training_enable,yes',
                'language_check.*' => 'required|string',
                'image_file' => 'required|mimes:jpg,jpeg,png|max:2048',
                'cv_file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',

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

        $applicants = Applicants::create([
            'applicant_name' => $request->applicant_name,
            'email' => $request->email,
            'address_details' => $request->address_details,
            'has_training' => $request->training_enable,
            'id_division' => $request->division,
            'id_district' => $request->district,
            'id_thana' => $request->thana_upo,
            'programming_language' => $request->language_check,
        ]);
        $path1 = $this->UploadFiles($request->file('image_file'), 'applicants'); //use the method in the trait
        $path2 = $this->UploadFiles($request->file('cv_file'), 'applicants'); //use the method in the trait

        ApplicantFiles::insert(
[
                [
                    'id_applicant' => $applicants->id,
                    'type' => 'image',
                    'path' => $path1,
                    'file_name' => $path1,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ], [
                    'id_applicant' => $applicants->id,
                    'type' => 'cv',
                    'path' => $path2,
                    'file_name' => $path2,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]
]
        );


        if ($request->training_enable == 'yes') {
            foreach ($request->training_name as $key => $value) {
                ApplicantTrainingInfos::create([
                    'id_applicant' => $applicants->id,
                    'training_name' => $value,
                    'details' => $request->training_details[$key],
                ]);
            }
        }
        if ($request->exam) {
            foreach ($request->exam as $key => $value) {
                ApplicantEducationalInfos::create([
                    'id_applicant' => $applicants->id,
                    'exam_name' => $value,
                    'university' => $request->university[$key],
                    'board' => $request->board[$key],
                    'result' => $request->result[$key],
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'error' => [
                'message' => 'Success',
                'details' => []
            ],
        ], 200);
    }

    public function UploadFiles($file, $folder = null, $disk = 'public', $filename = null)
    {
        $FileName = !is_null($filename) ? $filename : Str::random(10);
        return $file->storeAs(
            $folder,
            $FileName . "." . $file->getClientOriginalExtension(),
            $disk
        );
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
