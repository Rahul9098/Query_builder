<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_data = DB::table('users')->get();

        return view('home', compact('show_data'));
    }

    public function query()
    {
        $show_data = DB::table('query')->select()->limit(10)->get();

        return view('home', compact('show_data'));
    }

    public function show(Request $request)
    {

        $input = $request->all();
        $star = $input['star'];
        $table = $input['table'];
        $where = $input['where'];
        $query_string = "SELECT\t" . $star . "\tFROM\t" . $table . "\tWHERE\t" . $where . "";
        $date=array('query'=>$query_string,'created_at'=>'created_at');
        DB::table('query')->insert($date);
        $select=DB::table('query')->select()->limit(10)->get();
        $result_array=array();
        $result_array['query_string']=$query_string;
        $result_array['select']=$select;
        echo json_encode($result_array);

        //echo $query = DB::table($table)->select($star)->where($where)->get();
        // print_r($query);
        //DB::table('query')->insert($query_string);

    }


}
