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

                            <label style="margin-left: 30px">
                                SELECT <input type="text" class="form-control"  name="star"  size="10" style="margin-left: 30px">
                            </label>

                            <label style="margin-left: 30px">
                                 FROM
                                <select id="table" class="form-control" name="table"  style="margin-left: 30px">

                                    <option>users</option>
                                    <option>social_logins</option>
                                    <option>role_user</option>
                                    <option>roles</option>
                                    <option>password_resets</option>
                                    <option>migrations</option>
                                    <option>permissions</option>
                                    <option>permission_role</option>
                                    <option>linkedin_users</option>

                                        {{--@foreach($show_data as $key)--}}
                                                {{--<option> {{ $key->table}}</option>--}}
                                                {{--<option> {{ $key->table}}</option>--}}
                                                {{--<option> {{ $key->table}}</option>--}}
                                                {{--<option> {{ $key->table}}</option>--}}
                                                {{--<option> {{ $key->table}}</option>--}}
                                        {{--@endforeach--}}

                                </select>

                            </label>

                            <label  style="margin-left: 30px">

                                WHERE <select id="field" class="form-control" name="field"  style="margin-left: 30px">
                                    </select>
                                <input type="text"  class="form-control" name="where"  style="margin-left: 30px">

                            </label>


                                <button class="btn btn-success" id="btn_go" onclick="go();" type="button" style="margin-left:115px">Go</button>

                                <div align="right">
                                    <label id="query-show" style="text-align:center;color:red;display:none"></label>
                                    <button class="btn btn-primary" id="get_result" type="button" >Get Result</button>
                                </div>

                    </form>


                    <table id="dt" class="table table-bordered table-hover table table-condensed" align="center">

                        <thead >
                        <tr style="background-color: #B0BEC5">


                            <th> id &nbsp;</th>
                            <th> name &nbsp;</th>
                            <th> email &nbsp;</th>
                            <th> password &nbsp;</th>
                            <th> created_at &nbsp;</th>
                            <th> updated_at &nbsp;</th>


                            {{--<th> remember_token &nbsp;</th>--}}
                            {{--<th> created_at &nbsp;</th>--}}
                            {{--<th> updated_at &nbsp;</th>--}}
                        </tr>


                        @foreach($show_data as $key)
                            <tr>


                                <td> {{ $key->id}}</td>
                                <td> {{ $key->name}}</td>
                                <td> {{ $key->email}}</td>
                                <td> {{ $key->password}}</td>
                                <td> {{ $key->created_at}}</td>
                                <td> {{ $key->updated_at}}</td>
                                {{--<td> {{ $key->password}}</td>--}}
                                {{--<td> {{ $key->remember_token}}</td>--}}
                                {{--<td> {{ $key->created_at}}</td>--}}
                                {{--<td> {{ $key->updated_at}}</td>--}}
                                {{--<td>--}}
                                    {{--<a class="btn btn-info" href="{{url('cards/edit',$key->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>--}}

                                {{--</td>--}}
                            </tr>

                        @endforeach
                        </thead>


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

                                {{--<th>--}}
                                {{--<input type="radio" id="radio" name="radio" >--}}
                                {{--</th>--}}

                                <th> Queries &nbsp;</th>
                                <th> Date and Time &nbsp;</th>
                               <th> Action </th>
                            </tr>



                            {{--@foreach($show_data as $key)--}}
                                {{--<tr>--}}


                                    {{--<td> {{ $key->date}}</td>--}}
                                    {{--<td> {{ $key->query}}</td>--}}

                                    {{--<a class="btn btn-info" href="{{url('cards/edit',$key->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>--}}

                                {{--</tr>--}}

                            {{--@endforeach--}}



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
   var url_table_show='{{url("home/show")}}';

</script>

<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.0.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/ajax_querybuilder.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/datatable.js')}}"></script>
{{--<script type="text/javascript" src="{{ URL::asset('js/datatable.bootstrap.js')}}"></script>--}}





{{--<script src="{{asset('js/ajax_querybuilder.js')}}"></script>--}}
