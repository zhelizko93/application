 <?php  
	 $connect = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b3de81240f1c9a", "14968ae3", "heroku_0ecd36cb29eac01");
	 $sql = "INSERT INTO company(title, estimated_earnings, pid) VALUES('".$_POST["title"]."', '".$_POST["estimated_earnings"]."', '".$_POST["pid"]."')";  
	 if(mysqli_query($connect, $sql)){  
	      echo 'Data Inserted';  
	 } 
 ?>  