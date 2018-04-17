<!-- HTML Action Page Begins Here -->
<html>
<head>
<title>
</title>
</head>

<style>
body {
background-image: url(greenBG.jpg);
background-size: cover;
background-position: top center !important;
background-repeat: no-repeat !important;
background-attachment: fixed;
}
</style>

<body>
<center>

<?php

//Connect to Database
$linkID=mysql_connect("localhost", "royce104", "royce104") or
	die('Cannot connect because: ');


//Select Box Information
$selectSingle=$_GET[selectSingle];
$submit=$_GET[submit];

//Query Statements
$sql = "SELECT * FROM people WHERE country='$selectSingle'";

//Query Variable Statements
   mysql_select_db('royce104');
   $countryQry = mysql_query( $sql, $linkID );
   
//Cannot Query
   if(! $countryQry )
   {
      die('Could not get data: ' . mysql_error());
   }
   

//Display Basic Information
   while($row = mysql_fetch_array($countryQry, MYSQL_ASSOC))
   {

//Display Names from that Country
   	print "<strong>" . $row['name'] . "</strong>";
   	print "</br>";
   	print "</br>";

//Display Images of Each Person   	
   	print "<img src=\" " . $row['image']."\" />";
   	print "</br>";
   	print "</br>";
   	
//Display Gender of Each Person   	
		print "Gender:";
		print " " . $row['gender'] . "</br>";
		print "</br>";

//Display Country of Each Person		
		print "Country:";
		print "</br>";
   	print $row['country'];
   	print "</br>";
   	print "</br>";

//Display Born Date of Each Person   	
   	print "Born: </br>";
   	print $row['born'];
   	print "</br>";
   	print "</br>";
   	
//Display Death Date of Each Person   	
		print "Died: </br>";
   	print $row['died'];
		print "<br />";
		print "<br />";
	}

		print "<br />";
		print "<br />";

?>

<form>
<input type="button" value="Back" 
 onClick="history.go(-1);return true;"> 
</form>

</center
</body>
</html>