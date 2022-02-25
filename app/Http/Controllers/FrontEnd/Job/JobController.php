<?php

namespace App\Http\Controllers\FrontEnd\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = Site::all();
        $jobTypes = JobType::all();
        return view('front-end.job.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Job $job)
    {

        try {
            $response = array('response' => '', 'success'=>false);
            $validator = Validator::make($request->all(), [
                'title'=>'required',
                'description'=>'required',
                'inTime'=>'required',
                'outTime'=>'required',
                'breakTimeStart'=>'required',
                'breakTimeEnd'=>'required',
                'jobStartDate'=>'required',
                'jobEndDate'=>'required',
                'type'=>'required',
                'experience'=>'required',
                'salary'=>'required',
                'gender'=>'required',
                'position'=>'required',
                'quantity'=>'required',
                'workingDays'=>'required|array',
            ]);

            if ($validator->fails()) {
                $response['response'] = $validator->messages()->first();
                return response(['status'=>'error','message'=>$validator->messages()->first()]);
            }

            $job->site_id = $request->site;
            $job->company_id = Auth::id();
            $job->job_title = $request->title;
            $job->job_description = $request->description;
            $job->time_in = $request->inTime;
            $job->time_out = $request->outTime;
            $job->break_time_start = $request->breakTimeStart;
            $job->break_time_end = $request->breakTimeEnd;
            $job->job_start_date = $request->jobStartDate;
            $job->job_end_date = $request->jobEndDate;
            $job->job_type = $request->type;
            $job->working_days = json_encode($request->workingDays);
            $job->experience = $request->experience;
            $job->salary = $request->salary;
            $job->gender = $request->gender;
            $job->position = $request->position;
            $job->quantity = $request->quantity;
            $job->save();

            return response(['status'=>'success','message'=>'Job Posted Successfully']);

        }catch (\Exception $exception){
            return response(['status'=>'error','message'=>$exception->getMessage()]);
        }
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

    // staff apply
    public function jobApply(Request $request)
    {
        try {
            $application = new JobApplication();
            $application->job_id = $request->jobId;
            $application->staff_id = $request->staffId;
            $application->save();

            return response(['status' => 'success', 'message' => 'Applied Successfully']);

        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => $exception->getMessage()]);
        }
    }

    // to show company
    public function jobApplications($jobId)
    {
        $job = Job::with('applications')->find($jobId);
        return view('front-end.job.show-applications',get_defined_vars());
    }
}
