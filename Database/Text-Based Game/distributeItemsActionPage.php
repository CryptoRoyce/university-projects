<html>
<head>
<title>
</title>
</head>
<style type="text/css">



body {
	background-color: #CCC;
	margin:80px 80px 100px 100px;
}
div#fixedheader {
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	color:#CCC;
	background:#333;
	padding:20px;
}
form {
    display: inline;
}


</style>
<body>

<div id='fixedheader'> <strong> Administration Control Panel</strong> </div>

<?php

		$username = $_POST[username2];
		$itemID = $_POST[itemID];
		

		//Connect to Database
		$linkID=mysql_connect("localhost", "alex", "alex") or
		die('Cannot connect because: ');
		mysql_select_db('alex');
		
		
		
		//Query
		$query = "UPDATE inventory AS i, user AS u SET i.slot5 = '$itemID' WHERE u.username = '$username' AND i.inventoryID = u.inventoryID";  


		mysql_query($query, $linkID);
/*		
	
		if ($linkID->query($run) === TRUE) {
  		 	echo "Record updated successfully";
		} else {
    		echo "Error updating record: " . $linkID->error;
		}
*/	
		print " Successfully Distributed Item <br />";  
   
?>

</body>
</html>