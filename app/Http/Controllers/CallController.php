<?php

namespace App\Http\Controllers;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallController extends Controller
{

    public function logsAll()
    {
       $calls = Call::all();
       
         return response()->json([
              'message' => 'Call logs retrieved successfully',
              'calls' => $calls
         ], 200);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     */
    public function logs(Request $request)
    {
        $call = new Call();
            $call->number = $request->number;
            $call->date = $request->date;
            $call->duration = $request->duration;
            $call->save();

        return response()->json([
            'message' => 'Call log created successfully',
            'call' => $call
        ], 201);
    }

    /**
     * Display the specified resource.
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $call = Call::find($id);
        $call->tags = $request->tags;
        $call->class = $request->class;
        $call->notes = $request->notes;
        $call->save();

        return response()->json([
            'message' => 'Call log updated successfully',
            'call' => $call
        ], 201);
    }


}
