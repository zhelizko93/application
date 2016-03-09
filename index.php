<html>  
      <head>  
           <title>Task</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive" >  
                     <h3 align="center">Task</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
           <div align="center">
            <form action="tree.php" method="get">
              <input type="submit" name="button" value="Show hierarchy" />
            </form>
          </div> 
      </body>  
 </html>  

<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
          var title = $('#title').text();  
          var estimated_earnings = $('#estimated_earnings').text(); 
          var pid = $('#pid').text();  
           if(title == '')  
           {  
                alert("Enter title");  
                return false;  
           }   
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{title:title, estimated_earnings:estimated_earnings, pid:pid},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.title', function(){  
           var id = $(this).data("id1");  
           var title = $(this).text();  
           edit_data(id, title, "title");  
      });  
      $(document).on('blur', '.estimated_earnings', function(){  
           var id = $(this).data("id2");  
           var estimated_earnings = $(this).text();  
           edit_data(id,estimated_earnings, "estimated_earnings");  
      });
      $(document).on('blur', '.pid', function(){  
           var id = $(this).data("id3");  
           var pid = $(this).text();  
           edit_data(id,pid, "pid");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id5");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 }); 
</script>  