<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\ContactPerson;
use App\Models\StaffCertification;
use App\Models\StaffOfficialTraining;
use Illuminate\Http\Request;

class StaffCertificationController extends Controller
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
        return view('front-end.profile.staff.certification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, StaffCertification $staffCertification)
    {
        try {
            $staffCertification->cert_name = $request->cert_name;
            $staffCertification->cert_no = $request->cert_no;
            $staffCertification->cert_issue = $request->cert_issue;
            $staffCertification->cert_expiry = $request->cert_expiry;
            $staffCertification->save();
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
        $staffCertification = StaffCertification::all();
        return view('front-end.profile.staff.certification.show', compact('staffCertification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffCertification = StaffCertification::find($id);
        return view('front-end.profile.staff.certification.edit', compact('staffCertification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, StaffCertification $staffCertification)
    {
        try {
            $staffCertification->cert_name = $request->cert_name;
            $staffCertification->cert_no = $request->cert_no;
            $staffCertification->cert_issue = $request->cert_issue;
            $staffCertification->cert_expiry = $request->cert_expiry;
            $staffCertification->save();
            $response = array('status' => 'success', 'message' => 'Data Updated Successful');
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
    public function destroy(StaffCertification $staffCertification)
    {
        try {
            if ($staffCertification->delete()) {
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
