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

<body>
<center>

<!-- The Div is used to center the form on the page. -->
<div>

<!-- Connect Proper Action Page -->
<form name='familyTreeForm' action='./monarchActionPage.php' method='get'>



<?php

//Linking to the database
$linkID=mysql_connect("localhost", "royce104", "royce104") or
	die('Cannot connect because: ');

//Query
  $sql = 'SELECT p.pid, p.name,m.pid, m.mid FROM people AS p, monarch AS m WHERE p.pid=m.pid';
  
//Query Variable Statements  
   mysql_select_db('royce104');
   $retval = mysql_query( $sql, $linkID );
   
//Cannot Query  
   if(! $retval )
   {
      die('Could not get data: ' . mysql_error());
   }

//Select Monarch Box   
 print "<p><strong>Select Monarch To Discover Their Biography</strong><br /></p>"; 


//Select Box Options Displayed for Monarchs
   print "<select name='selectSingle'>";   
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   {

   	print "<option value = \"" . $row['pid'] . "\" >" . $row['name'] . "</option>";

   }
   
   print "</select>";

?>

<!--  submit/reset             -->
<p><input type="button" value="Back" onClick="history.go(-1);return true;"/>  <input type='submit' name='Submit'/> <p>

</center>
</div>
</body>
</html>