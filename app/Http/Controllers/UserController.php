<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        try {
            User::factory()->create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'Code' => 400,
                'Message' =>'Error when entering, validate data and try again.'
            ]);
        }

        return response()->json([
            'Code' => 200,
            'Message' => 'User has been created successfully.'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $user = User::find($request['id']);
            $ancientUser = $user->name;
            (!is_null($request['name'])) ? $user->name = $request['name'] : "" ;
            (!is_null($request['email'])) ? $user->email = $request['email'] : "";
            (!is_null($request['password'])) ? $user->password = Hash::make($request['password']) : "";
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'Code' => 400,
                'Message' =>'Error updating user, ' . $ancientUser . ' try again.'
            ]);
        }

        return response()->json([
            'Code' => 200,
            'Message' => 'User ' . $ancientUser . ' successfully updated.'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        $request->validate(['id' => 'int|required']);

        try {
            User::destroy($request['id']);
        } catch (\Exception $e) {
            return response()->json([
                'Code' => 400,
                'Message' => 'Error when delete user.'
            ]);
        }

        return response()->json([
            'Code' => 200,
            'Message' => 'User successfully deleted.'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function read(Request $request): JsonResponse
    {
        $request->validate(['id' => 'int|required']);

        try {
            $user = User::find($request['id']);
        } catch (\Exception $e) {
            return response()->json([
                'Code' => 400,
                'Message' => 'Error fetching a user'
            ]);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);
    }
}
