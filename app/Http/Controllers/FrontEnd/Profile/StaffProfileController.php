<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Http\Controllers\Controller;
use App\Models\UserBankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Auth::user()->jobs;
        return view('front-end.profile.staff.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBasicDetails($type)
    {
        return view('front-end.profile.staff.create-'.$type);
    }
    public function storeBasicDetails(Request $request)
    {

        if ($request->urlType == 'bank'){
         $response =   $this->storeBank($request);
        }
        dd($response);
    }

    public function storeBank($request)
    {

        try {

            $detail = UserBankDetail::firstOrCreate(['id'=>$request['id']]);
            $detail->bank_name = $request->bankName;
            $detail->account_title = $request->accountTitle;
            $detail->account_number = $request->accountNumber;
            $detail->short_code = $request->shortCode;
            $detail->user_id = $request->userId;
            $detail->save();
            return ['message'=>'Saved Successfully','status'=>'success'];
        }catch (\Exception $exception){
            return ['message'=>$exception->getMessage(),'status'=>'error'];
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
