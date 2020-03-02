<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\JSONAPIResource;
use App\Comment;
use App\User;
use App\Story;
class CommentController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return response()->json(Comment::get(), 200);
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
    $request->validate([
        'body'=>'required',
    ]);
       $Comment = Comment::create($request->all());

       //return response()->json($Comment, 201);
       return new JSONAPIResource($Comment);

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Comment  $Comment
    * @return \Illuminate\Http\Response
    */
   public function show(Comment $Comment)
   {
       // $Comment = Comment::find($Comment);
       // if(is_null($Comment)){
       //     return response()->json('Record is not found', 404);

       // }
       // return response()->json($Comment, 200);
       return new JSONAPIResource($Comment);

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Comment  $Comment
    * @return \Illuminate\Http\Response
    */
   public function edit(Comment $Comment)
   {
       $Comment->update($request->all());
      // return response()->json($Comment, 200);
      return new JSONAPIResource($Comment);

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Comment  $Comment
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Comment $Comment)
   {
       $Comment->update($request->all());
      // return response()->json($Comment, 200);
      return new JSONAPIResource($Comment);

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Comment  $Comment
    * @return \Illuminate\Http\Response
    */
   public function destroy(Comment $Comment)
   {
       $Comment->delete();
       return response()->json('ddd', 204);
   }

}
