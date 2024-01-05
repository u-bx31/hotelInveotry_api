<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) return $this->notFoundResponse(['message' => "This user not exist"]);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->only(['first_name', 'last_name', 'email', 'phone_number', 'role']));
        $user->save();
        return $this->successResponse(['user' => $user]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) return $this->notFoundResponse(['message' => "This user not exist"]);

        $user->update($request->only(['first_name', 'last_name', 'email', 'phone_number', 'role']));

        return $this->successResponse(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) return $this->notFoundResponse(['message' => "This user not exist"]);
        $user->delete();
        return $this->successResponse(['message' => 'User deleted successfully']);
    }
}
