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
div {
position: absolute;
    left: 50%;
    top: 50%;
    text-align: center; 
    width:546px;
    height:265px;
    margin-left: -273px; /*half width*/
    margin-top: -132px; /*half height*/
}
</style>

<div>
<body>
<center>

<!-- Connect Proper Action Page -->
<form name='familyTreeForm' action='./childrenActionPage.php' method='get'>

<?php

//Connect to Database
$linkID=mysql_connect("localhost", "royce104", "royce104") or
	die('Cannot connect because: ');
	
//Query Statement
  $sql = 'SELECT DISTINCT p.pid, p.name FROM people AS p, relation AS r WHERE r.person1 = p.pid AND (r.relationship=1 OR r.relationship=2)';
  
//Query Variable Statements  
mysql_select_db('royce104');
$childrenQry = mysql_query( $sql, $linkID );

//Cannot Query
   if(! $childrenQry )
   {
      die('Could not get data: ' . mysql_error());
   }

//Select Country Box   
 print "<p><strong>Select Children To Discover Their Parents</strong><br /></p>"; 

//Children List
   print "<select name='selectSingle'>";   
   
 
//Get Names from Database 
   while($row = mysql_fetch_array($childrenQry, MYSQL_ASSOC))
   {
//Display Children's Names
   	print "<option value = \"" . $row['pid'] . "\" >" . $row['name'] . "</option>";

   }
   
   print "</select>";



	
?>

<!--  submit/reset             -->
<p><input type="button" value="Back" onClick="history.go(-1);return true;"/>  <input type='submit' name='Submit'/> <p>

</center>
</body>
</div>
</html>