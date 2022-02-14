<?php

namespace App\Http\Controllers\FrontEnd\Profile;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class CompanyProfileController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Auth::user()->jobs;
        return view('front-end.profile.company.show',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    public function createConfidential()
    {
        $user = User::find(\auth()->id());
        return view('front-end.profile.company.create-confidential',get_defined_vars());
    }

    public function updateConfidential(Request $request,$id)
    {
         try {

        $user = User::find($id);
        $user->registration_no = $request->registrationNo;
        $user->vat_no = $request->vatNo;
        $user->save();
             return response(['message'=>'Profile Updated Successfully','status'=>'success']);

        }catch (\Exception $exception){
            return response(['message'=>$exception->getMessage(),'status'=>'error']);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::id() == $id){
            $user = User::find($id);
        }else{
            return redirect('unauthorized');
        }
        return view('front-end.profile.company.edit',get_defined_vars());
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
        try {

            $duplicate = User::where('email',$request->email)->first();
            if($duplicate){
                return  response(['message'=>'User Already Exist','status'=>'error']);
            }
            $user = User::find($id);
            $user->name = $request->name;
            $user->phone_number = $request->phoneNumber;
            $user->office_number = $request->officeNumber;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->postal_code = $request->postalCode;
            $user->save();

            return response(['message'=>'Profile Updated Successfully','status'=>'success']);
        }catch (\Exception $exception){
            return response(['message'=>$exception->getMessage(),'status'=>'error']);
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
        //
    }

    public function updatePicture(Request $request)
    {
        $path = 'users/images';
        $file = $request->file('image');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';

        // Upload new image
        $upload = $file->move(public_path($path), $new_name);
        if (!$upload) {
            return response()->json(['success' => 0, 'msg' => 'Something went wrong']);
        } else {
            //get old Picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['avatar'];

            if ($oldPicture != '') {
                if (\File::exists(public_path($path . $oldPicture))) {
                    \File::delete((public_path($path . $oldPicture)));
                }
            }

            //update DB
            $update = User::find(Auth::user()->id)->update(['avatar' => $new_name]);

            if (!$upload) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong, updating picture in db failed.']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'youre Profile picture has been updated sccessfully', 'name'=> asset('/users/images/' . $new_name)]);
            }
        }


    }
}
