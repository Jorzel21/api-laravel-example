<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function list()
    {
        $bands = Band::get();
        return response()->json($bands);
    }

    public function get($id)
    {
        try {
            $band = Band::find($id);
            return $band ? response()->json($band) : abort(204, "Content Not Found");
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'name' => 'required|string|min:3',
                'gender' => 'required|string',
            ]);
            $band = Band::firstOrCreate($request->all());
            return response()->json($band);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
