<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        try {

            $user = User::with('personal_data', 'interest', 'social_network', 'framework')->findOrFail(1);
            $user->social_network->each(function ($socialNetwork) {
                $socialNetwork->path_img = url($socialNetwork->path_img);
            });

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }
}
