<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\StaffOfficialTraining;
use Illuminate\Http\Request;

class StaffOfficialTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.profile.staff.official-training.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, StaffOfficialTraining $staffOfficialTraining)
    {
        try {

            $staffOfficialTraining->courseName = $request->courseName;
            $staffOfficialTraining->certificateObtained = $request->certificateObtained;
            $staffOfficialTraining->user_id = $request->user()->id;
            $staffOfficialTraining->providerName = $request->providerName;
            $staffOfficialTraining->trainingStartDate = $request->trainingStartDate;
            $staffOfficialTraining->trainingEndDate = $request->trainingEndDate;
            $staffOfficialTraining->save();
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
         $staffOfficialTrainings = StaffOfficialTraining::all();
        return view('front-end.profile.staff.official-training.show', compact('staffOfficialTrainings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffOfficialTrainings = StaffOfficialTraining::find($id);
        return view('front-end.profile.staff.official-training.edit', compact('staffOfficialTrainings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,StaffOfficialTraining $staffOfficialTraining, $id)
    {
        try {
            $staffOfficialTraining->courseName = $request->courseName;
            $staffOfficialTraining->certificateObtained = $request->certificateObtained;
            $staffOfficialTraining->user_id = $request->user()->id;
            $staffOfficialTraining->providerName = $request->providerName;
            $staffOfficialTraining->trainingStartDate = $request->trainingStartDate;
            $staffOfficialTraining->trainingEndDate = $request->trainingEndDate;
            $staffOfficialTraining->save();
            $response = array('status' => 'success', 'message' => 'Data Updatad Successful');
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
    public function destroy(StaffOfficialTraining $staffOfficialTraining)
    {
        try {
            if ($staffOfficialTraining->delete()) {
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
