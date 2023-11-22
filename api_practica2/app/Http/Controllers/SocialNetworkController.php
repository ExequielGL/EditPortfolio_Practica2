<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialNetwork;
use Illuminate\Support\Facades\DB;

class SocialNetworkController extends Controller
{
    public function update(Request $request)
    {
        try {

            $user = User::findOrFail(1);
            DB::beginTransaction();
            $socialNetworks = $request->input('social_networks');
            foreach ($socialNetworks as $socialNetwork) {
                $userSocialNetwork = SocialNetwork::where('user_id', $user->id)
                                        ->where('id', $socialNetwork['id'])
                                        ->first();

                if ($userSocialNetwork) {
                    $userSocialNetwork->update($socialNetwork);
                } else {
                    $user->social_network()->create($socialNetwork);
                }
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Interests updated successfully',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
