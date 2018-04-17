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
<form name='familyTreeForm' action='./countryActionPage.php' method='get'>

<?php

//Connect to Database
$linkID=mysql_connect("localhost", "royce104", "royce104") or
	die('Cannot connect because: ');
	
//Query Statement
$sql = "SELECT distinct country FROM people WHERE country <>'' ";

//Query Variable Statements  
mysql_select_db('royce104');
$countryQry = mysql_query( $sql, $linkID );

//Cannot Query
   if(! $countryQry )
   {
      die('Could not get data: ' . mysql_error());
   }

//Select Country Box   
 print "<p><strong>Select Country To Discover People From That Timeline</strong><br /></p>"; 

//Country List
   print "<select name='selectSingle'>";   
   
   while($row = mysql_fetch_array($countryQry, MYSQL_ASSOC))
   {
//Display Country Names
   	print "<option value = \"" . $row['country'] . "\" >" . $row['country'] . "</option>";

   }
   
   print "</select>";
   
?>

<!--  submit/reset             -->
<p><input type="button" value="Back" onClick="history.go(-1);return true;"/>  <input type='submit' name='Submit'/> <p>


</center>
</div>
</body>
</html>