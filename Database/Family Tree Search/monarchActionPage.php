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

//Query Statements
$sql = 'SELECT * FROM people WHERE pid='.$selectSingle.'';
$sql2 = 'SELECT p.name FROM people AS p, relation AS r WHERE p.pid=r.person1 AND r.relationship=1 AND r.person2='.$selectSingle.'';
$sql3 = 'SELECT p.name FROM people AS p, relation AS r WHERE p.pid=r.person1 AND r.relationship=2 AND r.person2='.$selectSingle.'';
$sql4 = 'SELECT p.name FROM people AS p, relation AS r WHERE p.pid=r.person1 AND r.relationship=3 AND r.person2='.$selectSingle.'';

//Query Variable Statements
   mysql_select_db('royce104');
   $retval = mysql_query( $sql, $linkID );
         $retval2 = mysql_query( $sql2, $linkID );
         	$retval3 = mysql_query( $sql3, $linkID );
         		$retval4 = mysql_query( $sql4, $linkID );
         		
//Cannot Query
   if(! $retval )
   {
      die('Could not get data: ' . mysql_error());
   }
   
   if(! $retval2 )
   {
      die('Could not get data: ' . mysql_error());
   }
   
   if(! $retval3 )
   {
      die('Could not get data: ' . mysql_error());
   }
   if(! $retval4 )
   {
      die('Could not get data: ' . mysql_error());
   }
   
//Display Basic Information
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {
   	
//Monarch Name
   	print "<strong>" . $row['name'] . "</strong>";
   	print "</br>";
   	print "</br>";

//Image of Monarch   	
   	print "<img src=\" " . $row['image']."\" />";
   	print "</br>";
   	print "</br>";

//Gender of Monarch   	
		print "Gender:";
		print " " . $row['gender'] . "</br>";
		
//Country of Monarch		
   	print $row['country'];
   	print "</br>";
   	print "</br>";

//Born Date of Monarch   	
   	print "Born: </br>";
   	print $row['born'];
   	print "</br>";
   	print "</br>";

//Death Date of Monarch   	
		print "Died: </br>";
   	print $row['died'];
		print "<br />";
		print "<br />";
   	
	}	


//Son's Loop
   	while($row = mysql_fetch_array($retval2, MYSQL_ASSOC)){
   		if (isset($row['name'])) {
				print "Sons: </br>";
		}
   			print " " . $row['pid'] . $row['name'] . "</br></option>";
}

//Daughter's Loop
		while($row = mysql_fetch_array($retval3, MYSQL_ASSOC)){
			 if (isset($row['name'])) {
				print "</br>Daughters: </br>";
		}
   		print " " . $row['pid'] . $row['name'] . "</br></option>";
}

//Spouse's Loop	
		while($row = mysql_fetch_array($retval4, MYSQL_ASSOC)){
			if (isset($row['name'])) {
				print "</br>Spouse: </br>";
		}
   		print " " . $row['pid'] . $row['name'] . "</br></option>";
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
