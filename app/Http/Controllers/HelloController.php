<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
// use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{
   public function index(Request $request){

       $items = DB::select('select * from people');
       return view('hello.index', ['items' => $items]);
   }

   public function post(Request $request)
   {    

        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $msg = $request->msg;

        $response = response()->view('hello.index', [
            'msg' => $msg . 'をクッキーに保存した',
        ]);

        $response->cookie('msg', $msg, 100);

        return $response;


        // $validator = Validator::make($request->all(), [
        //     'name' => ['required'],
        //     'mail' => ['email'],
        //     'age' => ['numeric' , 'between:0,150'],
        // ]);
        // if ($validator->fails()){
        //     return redirect('/hello')->withErrors($validator)->withInput();
        // }


        // $rules = [
        //     'name' => ['required'],
        //     'mail' => ['email'],
        //     'age' => ['numeric' ],
        // ];
        // $messages = [
        //     'name.required' => '名前は必ず入力してください。',
        //     'mail.email' => 'メールアドレスが必要です',
        //     'age.numeric' => '年齢は整数で記入してください',
        //     'age.min' => '年齢はゼロ以上で記入ください',
        //     'age.max' => '年齢は200歳以下で記入してください',
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);

        // $validator->sometimes('age', 'min:0', function($input) {
        //     return is_numeric($input->age);
        // });

        // $validator->sometimes('age', 'max:200', function($input) {
        //     return is_numeric($input->age);
        // });


        // if ($validator->fails()) {
        //     return redirect('/hello')->withErrors($validator)->withInput();

        // }
        // // $validator->validate();

        // return view('hello.index', ['msg' => '正しく入力されました。']);

        // return view('hello.index', ['msg' => '正しく入力された']);
   }


}
