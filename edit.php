 <?php  
	 $connect = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b3de81240f1c9a", "14968ae3", "heroku_0ecd36cb29eac01");
	 $id = $_POST["id"];  
	 $text = $_POST["text"];  
	 $column_name = $_POST["column_name"];  
	 $sql = "UPDATE company SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	 if(mysqli_query($connect, $sql)){  
	      echo 'Data Updated';  
	 	}  
 ?>  