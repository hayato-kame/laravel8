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
    public function index(Request $request)
    {
        // $items = DB::select('select * from people');
        // return view('hello.index', ['items' => $items]);

        // $items = DB::table('people')->get();
        // return view('hello.index', ['items' => $items]);

        $items = DB::table('people')->simplePaginate(5);
        return view('hello.index', ['items' => $items]);

    }

    public function show(Request $request)
    {
        // $id = $request->id;
        // $item = DB::table('people')->where('id', $id)->first();
        // return view('hello.show', ['item' => $item]);

        // $id = $request->id;
        // $items = DB::table('people')->where('id', '>=', $id)->get();
        // return view('hello.show', ['items' => $items]);

        // $name = $request->name;
        // $items = DB::table('people')->where('name', 'like', '%' . $name . '%')
        // ->orWhere('mail', 'like', '%' . $name . '%')->get();
        // return view('hello.show', ['items' => $items]);

        // $min = $request->min;
        // $max = $request->max;
        // $items = DB::table('people')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        // return view('hello.show', ['items' => $items]);

        $page = $request->page;
        $items = DB::table('people')->offset(($page-1) * 3)->limit(3)->get();
        return view('hello.show', ['items' => $items]);

    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

   public function create(Request $request)
   {
       $param = [
           'name' => $request->name,
           'mail' => $request->mail,
           'age' => $request->age,
       ];
    //    DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)' , $param);
       
        DB::table('people')->insert($param);
        return redirect('/hello');
   }

   public function edit(Request $request)
   {
    //    $param = ['id' => $request->id];
    //    $item = DB::select('select * from people where id = :id', $param);

    //    return view('hello.edit', ['form' => $item[0]]);

    $item = DB::table('people')->where('id', $request->id)->first();
    return view('hello.edit', ['form' => $item]);

   }

   public function update(Request $request)
   {
    //    $param = [
    //        'id' => $request->id,
    //        'name' => $request->name,
    //        'mail' => $request->mail,
    //        'age' => $request->age,
    //    ];
    //    DB::update('update people set 
    //    name = :name, mail = :mail, age = :age 
    //    where id = :id', $param);       
    //    return redirect('/hello'); 

    $param = [
        'name' => $request->name,
        'mail' => $request->mail,
        'age' => $request->age,
    ];
    DB::table('people')->where('id', $request->id)->update($param);
    return redirect('/hello');

   }

   public function del(Request $request)
   {
    //    $param = ['id' => $request->id];
    //    $item = DB::select('select * from people where id = :id', $param)
    //    return view('hello.del', ['form' => $item[0]]);

    $item = DB::table('people')->where('id', $request->id )->first();
    return view('hello.del', ['form' => $item]);
   }

   public function remove(Request $request)
   {
    //    $param = ['id' => $request->id];
    //    DB::delete('delete from people where id = :id', $param);
    //    return redirect('/hello');

    DB::table('people')->where('id', $request->id)->delete();
    return redirect('/hello');
   }

   public function rest(Request $request)
   {
       return view('hello.rest');
   }

   public function ses_get(Request $request)
   {
       $sesdata = $request->session()->get('msg');
       return view('hello.session', ['session_data' => $sesdata]);
   }

   public function ses_put(Request $request)
   {
       $msg = $request->input;
       $request->session()->put('msg', $msg);
       return redirect('hello/session');
    }

}
