<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\StaffEmploymentHistory;
use Illuminate\Http\Request;

class StaffEmploymentHistoryController extends Controller
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

    public function view($id)
    {
        $employmentHistory = StaffEmploymentHistory::find($id);
        return view('front-end.profile.staff.employment-history.view', compact('employmentHistory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.profile.staff.employment-history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, StaffEmploymentHistory $employmentHistory)
    {
        try {
            $employmentHistory->emp_title = $request->emp_title;
            $employmentHistory->user_id = $request->user()->id;
            $employmentHistory->emp_com_name = $request->emp_com_name;
            $employmentHistory->emp_reason = $request->emp_reason;
            $employmentHistory->emp_postal = $request->emp_postal;
            $employmentHistory->emp_comp_address = $request->emp_comp_address;
            $employmentHistory->emp_contact_name = $request->emp_contact_name;
            $employmentHistory->email = $request->email;
            $employmentHistory->phone_number = $request->phone_number;
            $employmentHistory->emp_join = $request->emp_join;
            $employmentHistory->emp_ending = $request->emp_ending;
            $employmentHistory->save();
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
        $employmentHistory = StaffEmploymentHistory::all();
        return view('front-end.profile.staff.employment-history.show', compact('employmentHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employmentHistory = StaffEmploymentHistory::find($id);
        return view('front-end.profile.staff.employment-history.edit', compact('employmentHistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffEmploymentHistory $employmentHistory)
    {
        try {
            $employmentHistory->emp_title = $request->emp_title;
            $employmentHistory->user_id = $request->user()->id;
            $employmentHistory->emp_com_name = $request->emp_com_name;
            $employmentHistory->emp_reason = $request->emp_reason;
            $employmentHistory->emp_postal = $request->emp_postal;
            $employmentHistory->emp_comp_address = $request->emp_comp_address;
            $employmentHistory->emp_contact_name = $request->emp_contact_name;
            $employmentHistory->email = $request->email;
            $employmentHistory->phone_number = $request->phone_number;
            $employmentHistory->emp_join = $request->emp_join;
            $employmentHistory->emp_ending = $request->emp_ending;
            $employmentHistory->save();
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staffEmployment_delete = StaffEmploymentHistory::find($id);
        try {
            if ($staffEmployment_delete->delete()) {
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
