 <?php  
	 $connect = mysqli_connect("localhost", "root", "", "db");  
	 $sql = "DELETE FROM company WHERE id = '".$_POST["id"]."'";  
	 if(mysqli_query($connect, $sql)){  
	      echo 'Data Deleted';  
	 	}  
 ?> 