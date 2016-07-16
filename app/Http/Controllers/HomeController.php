<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Schema;
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
        $operator = $input['operator'];
        $condition = $input['condition'];
        $query_string = "SELECT\t" . $star . "\tFROM\t" . $table . "\tWHERE\t" . $where . $operator . "'".$condition ."'";
        //$date = array('query' => $query_string, 'created_at' => 'created_at');
        //DB::table('query')->insert($date);
        //$select = DB::table('query')->select()->limit(10)->get();
        $result_array = array();
        $result_array['query_string'] = $query_string;
        //$result_array['select'] = $select;
        echo json_encode($result_array);

        //echo $query = DB::table($table)->select($star)->where($where)->get();
        // print_r($query);
        //DB::table('query')->insert($query_string);

    }


    public function get_result(Request $request)
    {



        $input = $request->all();

        $star = $input['star'];
        //$field_array=explode(" ,",$star);

        $table = $input['table'];
        $where = $input['where'];
        $operator = $input['operator'];
        $condition = $input['condition'];
         $query_string = "SELECT\t" . $star . "\tFROM\t" . $table . "\tWHERE\t" . $where . $operator . "'".$condition ."'";
        $data = array('query' => $query_string, 'created_at' =>Carbon::now());
       // print_r($data);
        DB::table('query')->insert($data);
        $select = DB::table('query')->select()->limit(10)->orderby('id','desc')->get();
        $data1=array($where=>$condition);
        $get_query = DB::table($table)->select()->where($data1)->get();
        $columns = Schema::getColumnListing($table);

        $result_array = array();
        $result_array['get_query'] = $get_query;
        $result_array['columns'] = $columns;
        $result_array['select'] = $select;
        echo json_encode($result_array);




    }

    public function show1(Request $request)
    {

        $tables = DB::select('SHOW TABLES');
        echo json_encode($tables);

    }

    public function show2(Request $request)
    {

        $input = $request->all();
        $table = $input['table'];
        $columns = Schema::getColumnListing($table);
        echo json_encode($columns);


    }

    public function  get_action(Request $request)
    
    {




        $input = $request->all();
        if($input['id']!=''){

            $id=$input['id'];
            $get_actions = DB::table('query')->select()->where('id',$id)->limit(10)->orderby('id','desc')->get();

            if(count($get_actions)>0){
            foreach ($get_actions as $get_action){

                $query=$get_action->query;
                $db=DB::select($query);
                //print_r($db);
                // $array = $words = preg_split('/\s+/', $query);
                //print_r($array);

                  echo json_encode($db);
            }

            }
        }

    }


}
