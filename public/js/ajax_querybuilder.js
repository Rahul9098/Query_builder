/**
 * Created by DOES-INAM on 7/11/2016.
 *
 **/

 // $(document ).ready(function() {

     var go=function() {

         $.ajax({
             type: 'post',
             url: url_home_show,
             dataType: 'json',
             data: {
                 '_token': $('input[name=_token]').val(),
                 'star': $('input[name=star]').val(),
                 'table': $('select[name=table]').val(),
                 'where': $('input[name=where]').val()
             },
             success: function (nim) {

                 var html='';
                 $('#query-show').show();
                 $('#query-show').html(nim['query_string']);

                    for(key in nim['select']){

                     var temp=nim['select'][key];


                     html += '<tr><td>' + temp.query + '</td>';
                        html += '<td>' + temp.created_at + '</td>';
                     html += '<td><input type="button" class="btn btn-info" value="Action"></td> </tr>';

                 }
                 $('.select').html(html);
             }
         });


     }

    // go();

     $('#get_result').click(function(){

         go();
     })

    // });


