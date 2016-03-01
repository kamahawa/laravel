<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    public function lamdeptunhien()
    {
        return view('manageproduct.lamdeptunhien');
    }

    public function mypham()
    {
        return view('manageproduct.mypham');
    }

    public function taphoa()
    {
        return view('manageproduct.taphoa');
    }
}
