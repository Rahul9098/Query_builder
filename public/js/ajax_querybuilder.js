
function action(action) {
    
    $.ajax({
        type: 'post',
        url: url_get_action,
        dataType: 'json',
        data: {
            '_token'   : $('input[name=_token]').val(),
            'id':action,
            
        },
        success: function(data) {
            var html1;
            var html2;
            //alert(data)

            for(var i = 0; i < data.length; i++){
                //console.log(i + ": " + data[i]);
            }
            $.each(data[0], function (index, value) {
                alert(index);
                alert(value);
                html1+= '<td style="background-color: #B0BEC5;font-style:normal">' + index + '</td>';
                html2 += '<td>' +value + '</td>';
            });
            for (key in data) {
                var temp=data[key];
                alert(temp.id)

            }
            $('#columns').html(html1);
            $('.get_show').html(html2);
            //$('#act').show();
            //$('#query-show').html(nim['query_string']);
        }
    });
}

$(document ).ready(function() {
     $('.table_change').change(function() {
         ajax1();
     });
     $('.get_result').click(function(){
        $.ajax({
            type: 'post',
            url: url_get_result,
            dataType: 'json',
            data: {
                '_token': $('input[name=_token]').val(),
                'star': $('input[name=star]').val(),
                'table': $('select[name=table]').val(),
                'where': $('select[name=where]').val(),
                'operator': $('select[name=operator]').val(),
                'condition': $('input[name=condition]').val(),
            },
            success: function (data) {
                var html='';
                var html1='';
                var html2='';
                var temp1='';
                var temp2='';

               // $('#query-show').show();
                //$('#query-show').html(nim['query_string']);
                for(key in data['select']){
                    var temp=data['select'][key];
                    html += '<tr><td id="'+ temp.id +'">' + temp.query + '</td>';
                    html += '<td>' + temp.created_at + '</td>';
                    html += '<td><button type="button" class="btn btn-info" id="act"  onclick="action('+ temp.id +');" >Action</button></td> </tr>';
                }
                for(key in data['columns']) {
                    var temp1 = data['columns'][key];
                    html1 += '<td style="background-color: #B0BEC5;font-style:normal">' + temp1 + '</td>';
                    //console.log(temp1);
                for(key in data['get_query']) {
                    var fields = data['columns'];
                    //alert(fields);
                    //var field=fields.split(' , ');
                   //alert(field);
                    //console.log(temp1);
                    // console.log(data['get_query'] [key]);
                    // console.log(data['get_query'] [key].temp1);
                    //alert(data['columns']);
                    var temp2 = data['get_query'][key];
                  //alert(temp2.id);
                    html2 += '<td>' + data['get_query'][key][temp1] + '</td>';
                    }
                }
                $('.select').html(html);
                $('#columns').html(html1);
                $('.get_show').html(html2);
            }
        });
    })
});

var go=function() {
         $.ajax({
             type: 'post',
             url: url_home_show,
             dataType: 'json',
             data: {
                 '_token'   : $('input[name=_token]')   .val(),
                 'star'     : $('input[name=star]')     .val(),
                 'table'    : $('select[name=table]')   .val(),
                 'where'    : $('select[name=where]')   .val(),
                 'operator' : $('select[name=operator]').val(),
                 'condition': $('input[name=condition]').val(),
             },
             success: function (nim) {
                 var html='';
                 $('#query-show').show();
                 $('#query-show').html(nim['query_string']);
        }
   });
}

 var ajax1= function() {
     var table = $('.table_change').val();
        $.ajax({
            type: "post",
            url: url_table_show2,
            dataType: "json",
            data: {
                "table": table,
                 "_token":token,
            },
            success: function (data) {
                //alert("success");
                console.log(data);
                var html = "";
                    for (key in data) {
                        var temp = data[key];
                             html += '<option>' + temp + '</option>';
                           }
                $('#field').html(html);
                }
        });
}

$(document ).ready(function() {
         $.ajax({
             type: 'post',
             url: url_table_show1,
             dataType: 'json',
             data: {
                 '_token': token,
             },
             success: function (data) {
                 var html='';
                 for(key in data){
                     var temp=data[key];
                     html+='<option value="'+temp.Tables_in_autherr+'">'+temp.Tables_in_autherr+'</option>';
                 }
                 $("#table").html(html);
             }
         });
         ajax1();
     });




