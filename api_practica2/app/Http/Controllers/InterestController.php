<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterestController extends Controller
{
    public function update(Request $request)
    {
        try {
            $user = User::findOrFail(1);
            DB::beginTransaction();

            $interests = $request->input('interests');

            foreach ($interests as $interest) {
                $userInterest = Interest::where('user_id', $user->id)
                                        ->where('id', $interest['id'])
                                        ->first();

                if ($userInterest) {
                    $userInterest->update($interest);
                } else {
                    $user->interest()->create($interest);
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
