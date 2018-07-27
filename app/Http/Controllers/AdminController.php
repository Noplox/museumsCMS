<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        $this->middleware('auth');
    }


    public function addMuseum()
    {
        return view('addMuseum');
    }

    public function uploadMap(Request $request)
    {
        $mapFile = $request->file('mapFile');

        $filename = $mapFile->getClientOriginalName();
        $existingMuseum = Museum::where('name', '=', 'filename')->first();
        if($existingMuseum == null) {
            $existingMuseum = new Museum();
            $existingMuseum->name = $filename;
            $existingMuseum->save();
        }

        $mapFile->storeAs('museums', $filename);

        return redirect()->route('home')->with('status', 'Museum uploaded');

    }
}
