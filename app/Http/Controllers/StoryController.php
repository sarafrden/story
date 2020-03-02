<?php

namespace App\Http\Controllers;

use App\Story;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\StoryResource;
use App\Http\Resources\StoryCollection;
use App\Http\Resources\JSONAPIResource;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Story = Story::all(); return new StoryCollection($Story);

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
        $Story = Story::create($request->all());

        //return response()->json($Story, 201);
        return new JSONAPIResource($Story);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $Story
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Story = Story::find($id);
        if(is_null($Story)){
            return response()->json('Record is not found', 404);

        }
        $Comment = Comment::where('story_id', $id)->get();
        $response = [
            'Story' => $Story,
            'Comment' => $Comment
        ];
         return response()->json($response, 200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $Story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $Story)
    {
        $Story->update($request->all());
       // return response()->json($Story, 200);
       return new JSONAPIResource($Story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $Story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $Story)
    {
        $Story->update($request->all());
       // return response()->json($Story, 200);
       return new JSONAPIResource($Story);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $Story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $Story)
    {
        $Story->delete();
        return response()->json('ddd', 204);
    }
}
