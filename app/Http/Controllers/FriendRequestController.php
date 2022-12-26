<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Friend_Request as FriendRequest;

class FriendRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friendRequests = FriendRequest::all();
        return response()->json($friendRequests, 200);
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
        $sender = User::find($request->sender_id);
        $receiver = User::find($request->receiver_id);

        if (!$sender || !$receiver) {
            return response()->json([
                'success' => false,
                'message' => 'One or both users could not be found',
            ], 404);
        }

        $friendRequest = FriendRequest::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
        ]);

        return response()->json([
            'success' => true,
            'data' => $friendRequest,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend_Request  $friend_Request
     * @return \Illuminate\Http\Response
     */
    public function show(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend_Request  $friend_Request
     * @return \Illuminate\Http\Response
     */
    public function edit(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend_Request  $friend_Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FriendRequest $friendRequest)
    {


        $friendRequest->update([
            'accepted' => $request->accepted            
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend_Request  $friend_Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(FriendRequest $friendRequest)
    {
        $friendRequest->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
