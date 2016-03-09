 <?php  
	 $connect = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b3de81240f1c9a", "14968ae3", "heroku_0ecd36cb29eac01");
	 $sql = "DELETE FROM company WHERE id = '".$_POST["id"]."'";  
	 if(mysqli_query($connect, $sql)){  
	      echo 'Data Deleted';  
	 	}  
 ?> 