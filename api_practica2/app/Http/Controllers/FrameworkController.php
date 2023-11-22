<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Framework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrameworkController extends Controller
{
    public function update(Request $request)
    {
        try {
            // Encontrar el usuario
            $user = User::findOrFail(1);

            DB::beginTransaction();

            $frameworks = $request->input('frameworks');

            foreach ($frameworks as $framework) {
                // Encontrar el registro en Interests relacionado con el usuario
                $userFramework = Framework::where('user_id', $user->id)
                                        ->where('id', $framework['id'])
                                        ->first();

                if ($userFramework) {
                    // Si el interés existe, lo actualizamos
                    $userFramework->update($framework);
                } else {
                    $user->framework()->create($framework);
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
