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
h1 {
    text-align: center;
    padding: 25px;
    border: 5px solid black;
	 margin-bottom: 5px;
}
h2 {
	font-size: 20px;
	text-align: center;
   padding: 25px;
	margin-bottom: 550px;
}
</style>

<div>
<body>
<center>

<!-- Connect Proper Action Page -->
<form name='familyTreeForm' action='./parentsActionPage.php' method='get'>

<?php

//Connect to Database
$linkID=mysql_connect("localhost", "royce104", "royce104") or
	die('Cannot connect because: ');
	
//Query
  $sql = 'SELECT * FROM people';

//Query Variable Statements
mysql_select_db('royce104');
$peopleQry = mysql_query( $sql, $linkID );

//Cannot Query  
   if(! $peopleQry )
   {
      die('Could not get data: ' . mysql_error());
   }

//Top Text 
	print "<h1>";
	print "<strong><p> All Known People </strong><br/></p>"; 
	print "</h1>";
	print "<h2>";
	print "<strong><p> (Scroll Down) </strong><br/></p>"; 
	print "</h2>";


//Display All People Information
  
   
   while($row = mysql_fetch_array($peopleQry, MYSQL_ASSOC))
   {
   	
//Monarch Name
		print "<p>";
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
   	print "</br>";
		
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
		print "<br />";
		
//Line Separation
		print "________________________________________________________________";
		print "</p>";
  
   }
   
?>

<form>
<input type="button" value="Return" 
 onClick="history.go(-1);return true;"> 
</form>

</center>
</body>
</div>
</html>