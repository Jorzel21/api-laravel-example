<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello()
    {
        return "Hello Controller!";
    }

    public function store(Request $request)
    {
        try {
            info($request->all());
            $hello = Hello::firstOrCreate($request->all());
            return response()->json($hello);
        } catch (\Exception $r) {
            return response()->json($r->getMessage(), 400);
        }
    }
}
