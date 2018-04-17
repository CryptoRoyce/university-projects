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

//Query Statements
$sql = 'SELECT * FROM people AS p, relation AS r WHERE r.person2=p.pid AND (r.relationship=2 OR r.relationship=1) AND r.person1='.$selectSingle.'';

//Query Variable Statements
   mysql_select_db('royce104');
   $childrenQry = mysql_query( $sql, $linkID );
   
//Cannot Query
   if(! $childrenQry )
   {
      die('Could not get data: ' . mysql_error());
   }
   

//Display Basic Information
   while($row = mysql_fetch_array($childrenQry, MYSQL_ASSOC)){


//Father/Mother Displayed Based on Gender
   	if($row['gender']==M)
   	{
		print "<strong> " . 'Father' . "</strong></br>";
		}
		print "</br>";

		if($row['gender']==F)
		{
		print "<strong> " . 'Mother' . "</strong></br>";
		print "</br>";
		}

//Parent Names
   	print $row['name'];
   	print "</br>";
   	print "</br>";
   	
   	print "<img src=\" " . $row['image']."\" />";
   	print "</br>";
   	print "</br>";
   	
//Countries if they exists		
		if($row['country'] != NULL)
		{
		print "Country:";
		print "</br>";
   	print $row['country'];
   	print "</br>";
   	print "</br>";
   	}

//Date Parent Was Born   	
		if($row['born'] != NULL)
		{
   	print "Born: </br>";
   	print $row['born'];
   	print "</br>";
   	print "</br>";
   	}

//Date Parent Died   	
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