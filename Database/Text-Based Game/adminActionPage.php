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

		
		//Connect to Database
		$linkID=mysql_connect("localhost", "alex", "alex") or
		die('Cannot connect because: ');
		
		//Query
  
		$sql = "SELECT * FROM user AS u, location AS l WHERE u.locationID = l.locationID AND u.username = '$username'";  

   
		//Query Variable Statements  
		mysql_select_db('alex');
		$locationIdentity = mysql_query( $sql, $linkID );
		
		if(! $locationIdentity )
  		{
     		die('Could not get data: ' . mysql_error());
 		}
		echo "<form name='createNewUserForm' action='./createNewUserPage.php' method='post'>";
  		echo "Create User: ";
  		echo "<br/>";
  		echo "<br/>";
  		echo "Username <input type='text' name='username1'/>";
  		echo "<br/>";
  		echo "<br/>";
  		echo "Password <input type='password' name='passwd'/>";
  		echo "<br/>";
		echo "<p>  <input type='submit' name='Submit'/> <p>";
		echo "</form>";		
		
		
		echo "<form name='distributeItemsForm' action='./distributeItemsActionPage.php' method='post'>";
  		echo "Distribute Items: ";
  		echo "<br/>";
  		echo "<br/>";
  		echo "Username <input type='text' name='username2'/>";
  		echo "<br/>";
  		echo "<br/>";
  		echo "Item ID <input type='text' name='itemID'/>";
  		echo "<p>  <input type='submit' name='Submit'/> <p>";
  		echo "</form>";	
  		echo "<br/>";
  		



?>


</body>
</html>