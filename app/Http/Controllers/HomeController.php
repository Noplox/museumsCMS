<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Museum;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Home controller methods are publicly available
        //therefore no need for authentication middleware
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $museums = Museum::get();

        return view('home', ['museums' => $museums]);
    }

    public function downloadMap(Request $request)
    {
        $id = $request->input('id');
        $museum = Museum::where('id', '=', $id)->first();

        return Storage::download('museums/' . $museum->name);
    }

    public function generateQR(Request $request)
    {
        $id = $request->input('id');

        $url = route('downloadMap') . '?id=' . $id;

        return view('qrCode', ['url' => urlencode($url)]);
    }
}
