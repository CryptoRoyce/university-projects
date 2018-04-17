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


</style>

<body>





<!-- The Div is used to center the form on the page. -->

<?php
echo "<div id='fixedheader'> </div>";
?>

<!-- Connect Proper Action Page -->
<form name='familyTreeForm' action='./gameActionPage.php' method='get'>



<?php
//echo '<strong> Enter your username and password: </strong> '
?>
<center>
<!--  text box            -->
<p> 
Username <input type='text' name="username"/> 
</p>

<!-- password -->
<p>
Password <input type='password' name='passwd' />
</p>



<?php


?>





<!--  submit/reset             -->
<p>  <input type='submit' name='Submit'/> <p>
</center>
</body>
</html>