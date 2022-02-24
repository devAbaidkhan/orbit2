<?php

namespace App\Http\Controllers\FrontEnd\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function view($id)
    {
        $sites = Site::find($id);
        return view('front-end.site.view', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front-end.site.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $exists = Site::where('name', $request->name)
                ->where('company_id', $request->user()->id)
                ->exists();

            if ($exists) {
                $response = array('status' => 'error', 'message' => 'Site Already exists');
                return response()->json($response, 403);
            }

            $site = new Site();
            $site->company_id = $request->user()->id;
            $site->name = $request->name;
            $site->address = $request->address;
            $site->postal_code = $request->postalCode;
            $site->city = $request->city;
            $site->start_date = $request->startDate;
            $site->finish_date = $request->finishDate;
            $site->longitude = $request->longitude;
            $site->latitude = $request->latitude;
            $site->save();
            $response = array('status' => 'success', 'message' => 'Data Inserted Successful');
            return response()->json($response, 200);
        }catch (\Exception $exception){

            $response = array('status' => 'error', 'message' => $exception->getMessage());
        }

        return response()->json($response, 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
         $siteDeails = Site::all();
        return view('front-end.site.show', compact('siteDeails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sites = Site::find($id);
        return view('front-end.site.edit', compact('sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Site $site)
    {

        try {
            $exists = Site::where('name', $request->name)
                ->where('company_id', $request->user()->id)
                ->exists();

            if ($exists) {
                $response = array('status' => 'error', 'message' => 'Site Already exists');
                return response()->json($response, 403);
            }

            $site->company_id = $request->user()->id;
            $site->name = $request->name;
            $site->address = $request->address;
            $site->postal_code = $request->postalCode;
            $site->city = $request->city;
            $site->start_date = $request->startDate;
            $site->finish_date = $request->finishDate;
            $site->longitude = $request->longitude;
            $site->latitude = $request->latitude;
            $site->save();

            $response = array('status' => 'success', 'message' => 'Data Inserted Successful');
            return response()->json($response, 200);
        }catch (\Exception $exception){

            $response = array('status' => 'error', 'message' => $exception->getMessage());
        }

        return response()->json($response, 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        try {
            if ($site->delete()) {
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
