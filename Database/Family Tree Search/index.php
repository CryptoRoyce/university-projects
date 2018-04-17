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


<!-- The Div is used to center the form on the page. -->
<div>
<center>
<?php
echo '<strong> How do you want to browse for content? </strong> '
?>


<p>
<button style="height:25px; width:200px;" onclick="window.location='http://137.37.140.100/royce104/CITA215/FamilyTree/monarchPage.php'">Monarch Name</button>
</p>

<p>
<button style="height:25px; width:200px;" onclick="window.location='http://137.37.140.100/royce104/CITA215/FamilyTree/countryPage.php'">Country</button>
</p>

<p>
<button style="height:25px; width:200px;" onclick="window.location='http://137.37.140.100/royce104/CITA215/FamilyTree/parentsPage.php'">Parents</button>
</p>

<p>
<button style="height:25px; width:200px;" onclick="window.location='http://137.37.140.100/royce104/CITA215/FamilyTree/childrenPage.php'">Children</button>
</p>

<?php
echo '<strong> OR </strong> '
?>

<p>
<button style="height:25px; width:200px;" onclick="window.location='http://137.37.140.100/royce104/CITA215/FamilyTree/peoplePage.php'">Browse All People</button>
</p>

</center>

<!--  submit/reset             -->

</div>

</body>
</html>