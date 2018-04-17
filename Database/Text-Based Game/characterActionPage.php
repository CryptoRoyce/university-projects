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


<?php
session_start();

$username = $_SESSION['username'];

//Connect to Database
	$linkID=mysql_connect("localhost", "alex", "alex") or
		die('Cannot connect because: ');

//Query
  
	$sql = "SELECT * FROM user AS u, location AS l WHERE u.locationID = l.locationID AND u.username = '$username'";  
	$sql2 = "SELECT * FROM user WHERE username='$username'";
   
//Query Variable Statements  
	mysql_select_db('alex');
	$locationIdentity = mysql_query( $sql, $linkID );
	$characterStats = mysql_query( $sql2, $linkID );

   if(! $locationIdentity )
   {
      die('Could not get data: ' . mysql_error());
   }
   
//Location Header
	while($row = mysql_fetch_array($locationIdentity, MYSQL_ASSOC))
	{
		echo "<div id='fixedheader'> <strong> Location: </strong>";
		print "Character Statistics";
		echo "</div>";
	}
	
		while($row = mysql_fetch_array($characterStats, MYSQL_ASSOC))
	{
		echo "<center>";
		echo "<strong>";
		echo "Username: ";
		echo $row['username'];
		echo "</strong>";
		echo "<br/>";
		echo "Attack: ";
		echo $row['userAttack'];
		echo "<br/>";
		echo "Defense: ";
		echo $row['userDefense'];
		echo "<br/>";
		echo "Health: ";
		echo $row['userHealth'];
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "Close out of this tab when finished reading character statistics.";
		echo "</center>";
	}

session_destroy(); 
?>

</body>
</html>