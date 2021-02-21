<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
   public function index(){


       return view('hello.index', ['msg' => 'こんとろーらから']);
   }

   public function post(Request $request)
   {
       return view('hello.index', ['msg' => $request->msg]);
   }
}
