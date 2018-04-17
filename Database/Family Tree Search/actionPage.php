<?php

//Connect to Database
$linkID=mysql_connect("localhost", "royce104", "royce104") or
	die('Cannot connect because: ');


//Select Box Information
$selectSingle=$_GET[selectSingle];
$submit=$_GET[submit];

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
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){

   	print "<strong>" . $row['name'] . "</strong>";
   	print "</br>";
   	print "</br>";
   	print "<option value = \"" . $row['pid'] . "\" >" . $row['image'] . "</option>";
   	print "</br>";
		print "Gender:";
		print " " . $row['gender'] . "</br>";
   	print "<option value = \"" . $row['pid'] . "\" >" . $row['country'] . "</option>";
   	print "Born: </br>";
   	print "<option value = \"" . $row['pid'] . "\" >" . $row['born'] . "</option>";
		print "Died: </br>";
   	print "<option value = \"" . $row['pid'] . "\" >" . $row['died'] . "</option>";

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
				print "</br>Spouses: </br>";
		}
   		print " " . $row['pid'] . $row['name'] . "</br></option>";
}




?>
<html>
<head>
<title>
</title>
</head>
<body>









</body>
</html>
