<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use App\Models\UserBankDetail;
use App\Models\UserConfidentialDetail;
use App\Models\UserPassportDetail;
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
//        dd(\auth()->user()->jobApplications->count());
//        $users = User::with('jobApplications')->get();
//        dd($users->pluck('jobApplications')[8]);
        $appliedJobs = JobApplication::where('staff_id',Auth::id())->get()->pluck('job_id')->toArray();

        $jobs = Job::with('applications')->get();
        return view('front-end.profile.staff.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response */
    public function createBasicDetails($type)
    {
        $bankDetail = Auth::user()->bankDetail;
        $passportDetail = Auth::user()->passportDetail;
        $confidentialDetail = Auth::user()->confidentialDetail;

        $user = Auth::user();

        return view('front-end.profile.staff.create-'.$type,get_defined_vars());
    }
    public function storeBasicDetails(Request $request)
    {

        if ($request->urlType == 'bank'){
         $response =   $this->storeBank($request);
        }elseif ($request->urlType == 'passport'){
            $response =  $this->storePassport($request);
        }elseif ($request->urlType == 'basic'){
            $response =  $this->storeBasic($request);
        }elseif ($request->urlType == 'confidential'){
            $response =  $this->storeConfidential($request);
        }
        return $response;
    }

    public function storeBank($request)
    {

        try {

            $detail = UserBankDetail::where('user_id',$request->userId)->first();
            if(!$detail){
                $detail = new UserBankDetail();
            }

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
    public function storePassport($request)
    {
        try {

            $detail = UserPassportDetail::where('user_id',$request->userId)->first();
            if(!$detail){
                $detail = new UserPassportDetail();
            }

            $detail->passport_no = $request->passportNo;
            $detail->issued_country = $request->issuedCountry;
            $detail->issue_date = $request->issueDate;
            $detail->expiry_date = $request->expiryDate;
            $detail->visa_need = $request->visaNeed;
            $detail->user_id = $request->userId;
            $detail->save();
            return ['message'=>'Saved Successfully','status'=>'success'];
        }catch (\Exception $exception){
            return ['message'=>$exception->getMessage(),'status'=>'error'];
        }

    }
    public function storeBasic($request)
    {
        try {

            $user = User::find($request->userId);
            $user->name = $request->name;
            $user->phone_number = $request->phoneNumber;
            $user->office_number = $request->officeNumber;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->postal_code = $request->postalCode;
            $user->save();

            return ['message' => 'Profile Updated Successfully', 'status' => 'success'];
        } catch (\Exception $exception) {
            return ['message' => $exception->getMessage(), 'status' => 'error'];
        }
    }

    public function storeConfidential($request)
    {
        try {

            $detail = UserConfidentialDetail::where('user_id',$request->userId)->first();
            if(!$detail){
                $detail = new UserConfidentialDetail();
            }

            $detail->sia_number = $request->siaNumber;
            $detail->sia_role = $request->siaRole;
            $detail->licence_sector = $request->licenseSector;
            $detail->expiry_date = $request->expiryDate;
            $detail->pay_rate = $request->payRate;
            $detail->user_id = $request->userId;
            $detail->save();
            return ['message'=>'Update Successfully','status'=>'success'];
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
