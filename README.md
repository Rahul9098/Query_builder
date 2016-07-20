# Query_builder

**<ins>Introduction:</ins>**

The database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your application, and works on all supported database systems.
Query Builder's graphical user interface enables database developers or User to build SQL queries without the need for manual SQL coding. Using Query Builder, you can search and filter database objects, select objects and columns, create relationships between objects, view formatted query results, and save queries with little or no SQL knowledge.


![alt tag](https://github.com/Rahul9098/Query_builder/blob/master/public/img/Capture.PNG)

**<ins>According to above diagram we devoloped SELECT query</ins>**

A select **query** is a type of database object that shows information in Datasheet view. A **query** can get its data from one or more tables, from existing **queries**, or from a combination of the two. The tables or **queries** from which a **query** gets its data are referred to as its record source.

There are kindly two part in this project are follow:-

1. Query Builder
2. Previous Queries


**<ins>Query Builder:</ins>**

Query Builder is the first procedure of this project in which we used text boxes and select menu to build a perfect query.

![alt tag](https://github.com/Rahul9098/Query_builder/blob/master/public/img/Capture3.PNG)

The SELECT statement, which follows a consistent and specific format, begins with the SELECT keyword followed by the columns to be included in the format. If an asterisk (*) is placed after SELECT, this sequence is followed by the FROM clause that begins with the keyword FROM, followed by the data sources containing the columns specified after the SELECT clause. These data sources may be a single table, combination of tables, sub query or view.


In the first select menu, fetch all tables from the database through the Ajax which show in below.

```javascript
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
```

Now after that we select any table from the select menu then fetch all the fields of selected table through the Ajax which show in below.

![alt tag](https://github.com/Rahul9098/Query_builder/blob/master/public/img/Capture2.PNG)


```javascript
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

```

Finally filled all input boxes we click on the go button then show the query string in red color according to you build up, after that you click on the button of Get Result then fire the query and  you got the Dynamically data with table’s fields in tabular format through the Ajax.

```javascript
$(document ).ready(function() {
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
                    var temp2 = data['get_query'][key];
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

```
![alt tag](https://github.com/Rahul9098/Query_builder/blob/master/public/img/Capture5.PNG)

**<ins>Previous 10 Queries:</ins>**

This is another part of our project which is generated by Query Builder. Now we know that, after click on the Get Result then fired query are stored in our database with the date and time and show the last 10 Queries in the our 2nd  panel body with the fired query and Action button.
 				The last 10 previous queries are stored and it will be execute by the Action button and it’s also fetch the data Dynamically with table’s fields through the ajax.

```javascript
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
            for(var i = 0; i < data.length; i++){
            }
            $.each(data[0], function (index, value) {
                html1+= '<td style="background-color: #B0BEC5;font-style:normal">' + index + '</td>';
                html2 += '<td>' +value + '</td>';
            });
            for (key in data) {
                var temp=data[key];
            }
            $('#columns').html(html1);
            $('.get_show').html(html2);
        }
    });
}
```

![alt tag](https://github.com/Rahul9098/Query_builder/blob/master/public/img/Capture6.PNG)
