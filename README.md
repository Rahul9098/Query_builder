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
