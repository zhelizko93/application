<?php  
	function ShowTree ($parent_id) {    
		$connect = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "b3de81240f1c9a", "14968ae3", "heroku_0ecd36cb29eac01");  
	    $sql = "SELECT id, pid, title FROM company WHERE pid = $parent_id ORDER BY title";
	    $result = mysqli_query($connect, $sql);  
	    if   (mysqli_num_rows($result) > 0){
	        echo '<ul>';        
	        while ($row = mysqli_fetch_array($result)) {
	            echo '<li>'.$row['title']. '</li>';
	            ShowTree ($row['id']);             
	        }       
	        echo '</ul>';
		}
	}
	if (isset($_GET['button'])) {ShowTree(0);}
?> 