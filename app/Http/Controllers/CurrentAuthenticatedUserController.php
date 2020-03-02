<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\JSONAPIResource;
class CurrentAuthenticatedUserController extends Controller
{
    public function show(Request $request) {

        return response()->json($request->user(), 200); }

}
