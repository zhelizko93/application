 <?php  
	 $connect = mysqli_connect("localhost", "root", "", "db");  
	 $sql = "INSERT INTO company(title, estimated_earnings, pid) VALUES('".$_POST["title"]."', '".$_POST["estimated_earnings"]."', '".$_POST["pid"]."')";  
	 if(mysqli_query($connect, $sql)){  
	      echo 'Data Inserted';  
	 } 
 ?>  