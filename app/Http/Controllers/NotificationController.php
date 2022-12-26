<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();

        return response()->json([
            "success" => true,
            "data" => $notifications
        ]);
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
        $validatedData = $request->validate([
            "user_id" => "required",
            "type" => "required",
            "data" => "required"
        ]);

        $notification = Notification::create([
            "user_id" => $validatedData["user_id"],
            "type" => $validatedData["type"],
            "data" => $validatedData["data"]
        ]);

        return response()->json([
            "success" => true,
            "data" => $notification
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        return response()->json([
            "success" => true,
            "data" => $notification
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $validatedData = $request->validate([
            "user_id" => "sometimes",
            "type" => "sometimes",
            "data" => "sometimes"
        ]);

        $notification->update($validatedData);

        return response()->json([
            "success" => true,
            "data" => $notification
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return response()->json([
            "success" => true,
            "message" => "Notification deleted successfully"
        ]);
    }
}
