<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Room = Room::all();
        return $Room;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Room = Room::find($id);
        if (!$Room) return $this->notFoundResponse(['message' => "This Room not exist"]);
        return $Room;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $roomType = RoomType::find($request->room_types_id);
        if(!$roomType)return $this->notFoundResponse(['message' => "This RoomType not exist"]);
        $Room = new Room($request->only(['image', 'price', 'rating', 'availability']));
        $roomType->rooms()->save($Room);
        return $this->successResponse(['Room' => $Room]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Room = Room::find($id);
        if (!$Room) return $this->notFoundResponse(['message' => "This Room not exist"]);
        $roomType = RoomType::find($request->room_types_id);
        if(!$roomType)return $this->notFoundResponse(['message' => "This RoomType not exist"]);

        $Room->update($request->only(['room_types_id', 'image', 'price', 'rating', 'availability']));
        return $this->successResponse(['Room' => $Room]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Room = Room::find($id);
        if (!$Room) return $this->notFoundResponse(['message' => "This Room not exist"]);
        $Room->delete();
        return $this->successResponse(['message' => 'Room deleted successfully']);
    }
}
