<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\StaffPersonalReference;
use Illuminate\Http\Request;

class StaffPersonalReferenceController extends Controller
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
        $personalReference = StaffPersonalReference::find($id);
        return view('front-end.profile.staff.personal-reference.view', compact('personalReference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.profile.staff.personal-reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, StaffPersonalReference $personalReference)
    {
        try {
            $personalReference->user_id = $request->user()->id;
            $personalReference->ref_name = $request->ref_name;
            $personalReference->ref_num = $request->ref_num;
            $personalReference->ref_email = $request->ref_email;
            $personalReference->ref_rel = $request->ref_rel;
            $personalReference->ref_occup = $request->ref_occup;
            $personalReference->ref_long = $request->ref_long;
            $personalReference->ref_postal = $request->ref_postal;
            $personalReference->ref_address = $request->ref_address;
            $personalReference->save();
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
        $personalReference = StaffPersonalReference::all();
        return view('front-end.profile.staff.personal-reference.show', compact('personalReference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personalReference = StaffPersonalReference::find($id);
        return view('front-end.profile.staff.personal-reference.edit', compact('personalReference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $personalReference = StaffPersonalReference::find($id);
            $personalReference->user_id = $request->user()->id;
            $personalReference->ref_name = $request->ref_name;
            $personalReference->ref_num = $request->ref_num;
            $personalReference->ref_email = $request->ref_email;
            $personalReference->ref_rel = $request->ref_rel;
            $personalReference->ref_occup = $request->ref_occup;
            $personalReference->ref_long = $request->ref_long;
            $personalReference->ref_postal = $request->ref_postal;
            $personalReference->ref_address = $request->ref_address;
            $personalReference->save();
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
    public function destroy($id)
    {
        try {
            $personalReference = StaffPersonalReference::find($id);
            if ($personalReference->delete()) {
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
