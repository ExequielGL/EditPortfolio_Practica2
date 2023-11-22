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

            $user = User::findOrFail(1);
            DB::beginTransaction();
            $frameworks = $request->input('frameworks');
            foreach ($frameworks as $framework) {
                $userFramework = Framework::where('user_id', $user->id)
                                        ->where('id', $framework['id'])
                                        ->first();

                if ($userFramework) {
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
