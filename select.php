<?php  
 $connect = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b3de81240f1c9a", "14968ae3", "heroku_0ecd36cb29eac01");
 $output = '';  
 $sql = "SELECT o.id, o.title, o.estimated_earnings, o.pid, (SELECT ROUND(SUM(o1.estimated_earnings)+o.estimated_earnings,2) FROM company o1 WHERE o1.pid=o.id) total FROM company o ORDER BY o.id";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Id</th>  
                     <th width="40%">Title</th>  
                     <th width="20%">Estimated earnings</th> 
                     <th width="5%">Main company id</th> 
                     <th width="10%">Total estimated earnings</th>
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0){  
      while($row = mysqli_fetch_array($result)){  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="title" data-id1="'.$row["id"].'" contenteditable>'.$row["title"].'</td>  
                     <td class="estimated_earnings" data-id2="'.$row["id"].'" contenteditable>'.$row["estimated_earnings"].'</td>  
                     <td class="pid" data-id3="'.$row["id"].'" contenteditable>'.$row["pid"].'</td>
                     <td class="total" data-id4="'.$row["id"].'">'.$row["total"].'</td>
                     <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="title" contenteditable></td>  
                <td id="estimated_earnings" contenteditable></td>  
                <td id="pid" contenteditable></td> 
                <td id="total" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="5">Data not Found</td>  
                     </tr>
                ';  
 } 
 $output .= '</table>  
      </div>';  
 echo $output;  
?>  