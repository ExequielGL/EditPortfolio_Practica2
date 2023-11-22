<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalDataController extends Controller
{
    public function update(Request $request)
    {
        try {
            // Encontrar el usuario
            $user = User::findOrFail(1);

            // Encontrar el registro en DataPersonal relacionado con el usuario
            $dataPersonal = PersonalData::where('user_id', $user->id)->first();

            // Iniciar la transacción
            DB::beginTransaction();

            // Validar los campos del formulario
            $fields = $request->validate([
                'age' => 'sometimes',
                'email' => 'sometimes',
                'origin_city' => 'sometimes',
                'origin_country' => 'sometimes'
            ]);

            $dataPersonal->update($fields);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'user' => $dataPersonal,], 200);

        } catch (Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

}
