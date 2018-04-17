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
$sql = 'SELECT * FROM people AS p, relation AS r WHERE r.person1=p.pid AND (r.relationship=2 OR r.relationship=1) AND r.person2='.$selectSingle.'';
$sql2 = 'SELECT * FROM people WHERE pid='.$selectSingle.'';

//Query Variable Statements
   mysql_select_db('royce104');
   $parentsQry = mysql_query( $sql, $linkID );
   $parentsQry2 = mysql_query( $sql, $linkID );
   
//Cannot Query
   if(! $parentsQry )
   {
      die('Could not get data: ' . mysql_error());
   }
   

//Display Basic Information
   while($row = mysql_fetch_array($parentsQry, MYSQL_ASSOC))
   {

//Display Son if Gender=M
   	if($row['gender']==M)
   	{
		print "<strong> " . 'Son' . "</strong></br>";
		}
		print "</br>";

//Display Daughter if Gender=F
		if($row['gender']==F)
		{
		print "<strong> " . 'Daughter' . "</strong></br>";
		print "</br>";
		}

//Display Child's Name
   	print $row['name'];
   	print "</br>";
   	print "</br>";

//Display Child's Image   	
   	print "<img src=\" " . $row['image']."\" />";
   	print "</br>";
   	print "</br>";
   	
//Display Child's Country if it exist.		
		if($row['country'] != NULL)
		{
		print "Country:";
		print "</br>";
   	print $row['country'];
   	print "</br>";
   	print "</br>";
   	}

//Display Born Date if it exist.   	
		if($row['born'] != NULL)
		{
   	print "Born: </br>";
   	print $row['born'];
   	print "</br>";
   	print "</br>";
   	}

//Display Death Date if it exist.   	
		if($row['died'] != NULL)
		{
		print "Died: </br>";
   	print $row['died'];
		print "<br />";
		print "<br />";
		print "<br />";
		print "<br />";
   	print "</br>";
		}
	}
		print "<br />";
		print "<br />";

?>

<form>
<input type="button" value="Back" 
 onClick="history.go(-1);return true;"> 
</form>

</center>
</body>
</html>