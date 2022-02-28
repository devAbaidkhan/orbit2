<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\StaffEducation;
use Illuminate\Http\Request;

class StaffEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('front-end.profile.staff.education.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.profile.staff.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, StaffEducation $staffEducation): \Illuminate\Http\JsonResponse
    {
        try {
            $staffEducation->institutionName = $request->institutionName;
            $staffEducation->user_id = $request->user()->id;
            $staffEducation->degreeObtained = $request->degreeObtained;
            $staffEducation->speciality = $request->speciality;
            $staffEducation->institutionCountry = $request->institutionCountry;
            $staffEducation->institutionCity = $request->institutionCity;
            $staffEducation->startDate = $request->startDate;
            $staffEducation->endDate = $request->endDate;
            $staffEducation->save();
            $response = array('status' => 'success', 'message' => 'Data Inserted Successful');
            return response()->json($response, 200);

        } catch (\Exception $exception) {

            $response = array('status' => 'error', 'message' => $exception->getMessage());
            return response()->json($response,500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
         $staffEdcuation = StaffEducation::all();
        return view('front-end.profile.staff.education.show', compact('staffEdcuation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffEducations = StaffEducation::find($id);
        return view('front-end.profile.staff.education.edit', compact('staffEducations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, StaffEducation $staffEducation, $id)
    {
//        print_r($id);
//        exit();
        try {
            $staffEducation = StaffEducation::find($id);
            $staffEducation->institutionName = $request->institutionName;
            $staffEducation->user_id = $request->user()->id;
            $staffEducation->degreeObtained = $request->degreeObtained;
            $staffEducation->speciality = $request->speciality;
            $staffEducation->institutionCountry = $request->institutionCountry;
            $staffEducation->institutionCity = $request->institutionCity;
            $staffEducation->startDate = $request->startDate;
            $staffEducation->endDate = $request->endDate;
            $staffEducation->save();
            $response = array('status' => 'success', 'message' => 'Data Inserted Successful');
            return response()->json($response, 200);

        } catch (\Exception $exception) {

            $response = array('status' => 'error', 'message' => $exception->getMessage());
            return response()->json($response,500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(StaffEducation $staffEducation,$id)
    {
        //dd(StaffEducation::find($id));
        //dd($staffEducation->delete());

        try {
            $staffEducation_delete = StaffEducation::find($id);
            if ($staffEducation_delete->delete()) {
                $response = array('status' => 'success', 'message' => 'Data Deleted Successful');
                return response()->json($response, 200);
            }

            $response = array('status' => 'error', 'message' => 'Data Not Deleted Successful');
            return response()->json($response, 403);

        } catch (\Exception  $th) {
            $response = array('status' => 'error', 'message' => $th->getMessage());
            return response()->json($response, 403);
        }
    }
}
