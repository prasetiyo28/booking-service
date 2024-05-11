<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\UserBooking;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserBooking::all();
    }

        /**
     * Display a listing of the user resource.
     */
    public function userBookings(Request $request)
    {
        $user = $request->user();
        $user_booking = UserBooking::where('user_id', $user->id)->get();
        if(!$user_booking){
            return response()->json([
                'message' => "booking data not found.",
                'data' => null,
            ],404);
        }
        return response()->json([
            'message' => "Get All User Booking Succes.",
            'data' => $user_booking,
        ]);

        // return $user;
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = $request->user()->id;
        // echo($request);
        // var_dump($request->all());
        return UserBooking::create($request->all());
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_booking = UserBooking::where('id', $id)->first();
        if(!$user_booking){
            return response()->json([
                'message' => "booking data not found.",
                'data' => null,
            ],404);
        }
        return response()->json([
            'message' => "booking detail succesfully.",
            'data' => $user_booking,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_booking = UserBooking::find($id);
        $user_booking->update([
            'email'=> $request->email,
            'surf_type_id'   => $request->surf_type_id,
            'phone_number'   => $request->phone_number,
        ]);
        
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
