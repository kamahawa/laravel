<?php

namespace App\Http\Controllers;

use App\Models\ActUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $student = new ActUser();
        //$name = array('UserNameKana' => 'kama');
        //$tem = $student->selectUserById('201512040002');
        //var_dump($tem);
        return view("pages.index")->with('name',$student->select());
        //$student = ActStudent::all();
        //return view("pages.index")->with('name',$student);
    }

    //information
    public function aboutweb(){
        $data= 'Bus manager';
        return view("pages.aboutweb")->with('name',$data);
    }
}
