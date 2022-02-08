<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use TCG\Voyager\Models\Role;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()) {
            return view('auth.register');
        }

        return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(RegisterRequest $request,User $user)
    {
        try {

            $duplicate = User::where('email',$request->email)->first();
            if($duplicate){
                return response()->json(array("exists" => true));
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phoneNumber;
            $user->password = Hash::make($request->password);


            $role = Role::where('name' ,strtolower($request->role))->first();
            if(!$role){
                $role = Role::create(['name' => strtolower($request->role),'display_name'=>$request->role]);
            }

            $user->role_id = $role->id;
            $user->save();

//            $user->assignRole($role);

            return response(['message'=>'User Registered','status'=>'success']);
        }catch (\Exception $exception){
            return response(['message'=>$exception->getMessage(),'status'=>'error']);
        }
    }

    public function checkEmail(Request $request){
        $email = $request->input('email');
        $isExists = \App\Models\User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
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
}
