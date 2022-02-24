<?php

namespace App\Http\Controllers\ContactPerson;

use App\Http\Controllers\Controller;
use App\Models\ContactPerson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactPersonController extends Controller
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
        $contactPerson = ContactPerson::find($id);
        return view('front-end.contact-person.view', compact('contactPerson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.contact-person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request,ContactPerson $contactPerson)
    {
        try {

            $contactPerson->title = $request->title;
            $contactPerson->name = $request->name;
            $contactPerson->user_id = $request->user()->id;
            $contactPerson->user_type = $request->user()->role->name;
            $contactPerson->job_title = $request->jobTitle;
            $contactPerson->phone_number = $request->phoneNumber;
            $contactPerson->email = $request->email;
            $contactPerson->address = $request->address;
            $contactPerson->postal_code = $request->postalCode;
            $contactPerson->save();
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
        $contactPersons = ContactPerson::all();
        return view('front-end.contact-person.show', compact('contactPersons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactPerson = ContactPerson::find($id);
        return view('front-end.contact-person.edit', compact('contactPerson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ContactPerson $contactPerson )
    {
        try {
            $contactPerson->title = $request->title;
            $contactPerson->name = $request->name;
            $contactPerson->user_id = $request->user()->id;
            $contactPerson->user_type = $request->user()->role->name;
            $contactPerson->job_title = $request->jobTitle;
            $contactPerson->phone_number = $request->phoneNumber;
            $contactPerson->email = $request->email;
            $contactPerson->address = $request->address;
            $contactPerson->postal_code = $request->postalCode;
            $contactPerson->save();
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
    public function destroy(ContactPerson $contactPerson)
    {
        try {
            if ($contactPerson->delete()) {
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
