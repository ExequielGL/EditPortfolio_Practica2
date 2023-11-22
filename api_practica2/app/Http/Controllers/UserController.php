<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            $user = User::findOrFail(1);
            
            DB::beginTransaction();
            $fields = $request->validate([
                'name' => 'sometimes',
                'description' => 'sometimes',
            ]);
            
            $user->update($fields);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'user' => $user], 200);

        } catch (Exception $e){
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

}
