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
            // Encontrar el usuario
            $user = User::findOrFail(1);

            // Iniciar la transacción
            DB::beginTransaction();

            // Supongamos que los intereses vienen en un array en el request
            $interests = $request->input('interests');

            foreach ($interests as $interest) {
                // Encontrar el registro en Interests relacionado con el usuario
                $userInterest = Interest::where('user_id', $user->id)
                                        ->where('id', $interest['id'])
                                        ->first();

                if ($userInterest) {
                    // Si el interés existe, lo actualizamos
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
