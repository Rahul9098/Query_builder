@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px" id="home">
    <div class="row" >
        <div class="col-md-18 col-md-offset-0">
            <div class="panel panel-default" >
                <div class="panel-heading"><h4>Query Builder</h4> </div>
                    <div class="panel-body form-inline" >


                    <form action="{{url('home/show')}}" method="post">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <label style="margin-left: 15px">
                                        SELECT <input type="text" class="form-control"  name="star"  placeholder="* or 'name','email'" size="15" style="margin-left: 15px">
                                    </label>

                                    <label style="margin-left: 15px">FROM

                                        <select id="table"  class="form-control table_change" name="table"  style="margin-left: 15px">



                                        </select>

                                    </label>

                        <label  style="margin-left: 15px">

                                WHERE <select id="field" class="form-control" name="where"  style="margin-left: 15px">
                                      </select>
                            <select id="operator" name="operator" class="form-control"  style="margin-left: 15px">

                                <option> = </option>
                                <option> < </option>
                                <option> > </option>
                                <option> >= </option>
                                <option> =< </option>
                                <option> != </option>
                                <option> & </option>
                                <option> ! </option>
                            </select>

                                <input type="text"  class="form-control" name="condition"  style="margin-left: 15px">

                        </label>


                                <button class="btn btn-success" id="btn_go" onclick="go();"  type="button" style="margin-left: 40px">Go</button>

                                <div align="right">
                                    <label id="query-show" style="text-align:center;color:red;display:none"></label>
                                    <button class="btn btn-primary get_result"  type="button" >Get Result</button>
                                </div>


                    </form>


                    <table id="dt" class="table table-bordered table-hover table table-condensed" align="center">

                        <thead >
                        <tr style="background-color: #B0BEC5" id="columns">




                        </tr>
                        </thead>
                        <tbody ><tr class="get_show"></tr>


                        </tbody>


                    </table>


                </div>
            </div>
        </div>
    </div>
</div>



<div class="container" style="margin-top:50px" id="home">
    <div class="row" >
        <div class="col-md-18 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Previous 10 Queries</h4></div>
                <div class="panel-body">

                    <table id="dt" class="table table-bordered table-hover table table-condensed" align="center">

                                <thead >

                                    <tr style="background-color: #B0BEC5">
                                       <th> Queries &nbsp;</th>
                                       <th> Date and Time &nbsp;</th>
                                       <th> Action </th>
                                    </tr>

                                </thead>

                            <tbody class="select">
                            </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection



<script >

   var url_home_show='{{url("home/show")}}';
   var url_table_show1='{{url("home/show1")}}';
   var url_table_show2='{{url("home/show2")}}';
   var url_get_result='{{url("home/get-result")}}';
   var url_get_action='{{url("home/get-action")}}';
    var token='{{csrf_token()}}';


</script>

<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.0.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/ajax_querybuilder.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/datatable.js')}}"></script>
