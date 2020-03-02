<?php

namespace App\Http\Controllers;

use App\Mentor;
use App\Story;
use Illuminate\Http\Request;
use App\Http\Resources\JSONAPIResource;

class MentorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Mentor::get(), 200);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Mentor = Mentor::create($request->all());

        //return response()->json($Mentor, 201);
        return new JSONAPIResource($Mentor);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mentor  $Mentor
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $Mentor = Mentor::find($id);
        if(is_null($Mentor)){
            return response()->json('Record is not found', 404);

        }
        $Story = Story::where('mentor_id', $id)->get();
        $response = [
            'Mentor' => $Mentor,
            'Story' => $Story
        ];
         return response()->json($response, 200);
        //return new JSONAPIResource($response);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mentor  $Mentor
     * @return \Illuminate\Http\Response
     */
    // public function edit(Mentor $Mentor)
    // {
    //     $Mentor->update($request->all());
    //    // return response()->json($Mentor, 200);
    //    return new JSONAPIResource($Mentor);

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mentor  $Mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentor $Mentor)
    {
        $Mentor->update($request->all());
       // return response()->json($Mentor, 200);
       return new JSONAPIResource($Mentor);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mentor  $Mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentor $Mentor)
    {
        $Mentor->delete();
        return response()->json('ddd', 204);
    }
}
