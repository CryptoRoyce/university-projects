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
form {
    display: inline;
}
p {
	margin:5px 5px 10px 5px;
}

</style>
<body>




<!-- The Div is used to center the form on the page. -->

<?php

session_start();

//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Database Connection/////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$linkID=mysql_connect("localhost", "alex", "alex") or
		die('Cannot connect because: ');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Variables///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//User Commands	
	$commandBox = $_POST[commandBox];
	
//Creating Session Variable
	$_SESSION['username'] = $username;	

//Extra Variables
$currentLocation;


if ($currentLocation == NULL){	
	$currentLocation = 1;
}
	
if ($commandBox == "Talk" || $commandBox == "talk"){	
	$currentLocation = 3;
	}	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Getting Login Information///////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$username = $_GET[username];
	$password = $_GET[passwd];
	


//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Queries/////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$sql = "SELECT * FROM user";   
	$sql2 = "SELECT * FROM user AS u, location AS l WHERE u.locationID = l.locationID AND u.username = '$username'"; 
	 
	$statsQuery = "SELECT * FROM user WHERE username='$username'";
	
	$inventoryProcess = "SELECT * FROM user AS u, inventory AS i, items AS it WHERE u.username = '$username' 
								AND u.inventoryID = i.inventoryID AND (i.slot1 = it.itemID || i.slot2 = it.itemID || 
								i.slot3 = it.itemID || i.slot4 = it.itemID || i.slot5 = it.itemID)";
								
	$locationQuery = "UPDATE user SET locationID='$currentLocation' WHERE username = '$username'";
	$findLocationQuery = "SELECT locationID FROM user WHERE username = '$username'";
	
	$scoreUpdatePostive = "UPDATE user SET score = (score + 1) WHERE username = '$username'";
	$scoreUpdateNegative = "UPDATE user SET score = (score - 1) WHERE username = '$username'";
	$scoreUpdateDead = "UPDATE user SET score = (score - score) WHERE username = '$username'";
	
	$increaseHealth = "UPDATE user SET health = (health + 10) WHERE username = '$username'";
	$decreaseHealth = "UPDATE user SET health = (health - 10) WHERE username = '$username'";
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Converting Query Results////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	mysql_select_db('alex');
	$usersLoginRequest = mysql_query( $sql, $linkID );
	$locationIdentity = mysql_query( $sql2, $linkID );
	$usersLocation = mysql_query( $findLocationQuery, $linkID );
	
  	$inventory = mysql_query( $inventoryProcess, $linkID );
	$characterStats = mysql_query( $statsQuery, $linkID );
//	$updateLocation = mysql_query($locationQuery, $linkID);
	


//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Failed Query Responses//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

   if(! $usersLoginRequest )
   {
      die('Could not get data: ' . mysql_error());
   }

   if(! $locationIdentity )
   {
      die('Could not get data: ' . mysql_error());
   }
   
   if(! $characterStats )
   {
      die('Could not get data: ' . mysql_error());
   }
   
      if(! $inventory )
   {
      die('Could not get data: ' . mysql_error());
   }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Header//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
	while($row = mysql_fetch_array($locationIdentity, MYSQL_ASSOC))
	{
		echo "<div id='fixedheader'> <strong> Location: </strong>";
		print $row['locationName'];
		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Admin Control Button////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if ($username == "Admin") 
		{
			echo "	<form name='adminPanelAction' action='./adminActionPage.php' method='get'>";
			echo "	<button style='height:25px; width:200px; margin-left: 900px ' name='AdminPanel' type='submit' value='HTML'>Administrator Control Panel</button> ";
			echo "	</form>";
		}

		echo "</div>";
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Login Permissions///////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


   while($row = mysql_fetch_array($usersLoginRequest, MYSQL_ASSOC))
   {

		//Valid Login Information
		if ($row['username'] == $username && $row['password'] == $passwd && $commandBox == NULL) 
		{
			//Welcoming Message
			echo "<p>";
			echo "<strong> Welcome to SwordVStaff</br> </strong>";
			echo "<br/> You awake in the middle of a battlefield. People screaming, dust being kicked up around you, and
			the sound of chaos. You look up to a man in white robes. The man calls out your name and pulls you into a brick house.
			Suddenly a burst of light comes out of his weapon, creating a thin barrier around the room.";
			echo "<br/> ";
			echo "<br/> ";
			echo "</p>";
		}
		
		//Invalid Login Information
		if ($row['username'] != $username && $row['password'] != $passwd) 
		{
			echo "<div id='fixedheader'> </div>";
			echo "Invalid username or password.</br>";
			break;
		}
	
	//Finding Location
	while($row = mysql_fetch_array($usersLocation, MYSQL_ASSOC))
	{

//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Location 1//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//First Location				
	if($row['locationID'] == 1){
		echo "<p>";
		//Command List
		if($row['locationID'] == 1){
			echo "<strong>Commands:</strong>";
			echo "<br/> ";
			echo "Inventory";
			echo "<br/> ";
			echo "Stats";
			echo "<br/> ";
			echo "Yell";
			echo "<br/> ";
			echo "Dash";
			echo "<br/> ";
			echo "Talk";
			echo "<br/> ";
			echo "<br/> ";		
		}
			
		//Yell Command
		if($commandBox == "Yell" || $commandBox == "yell"){
			echo "<center>";	
			echo "You yell, mumbling words out of fear. The man in white robes says 'Did I grab the wrong boy?
						You don't seem very courageous.'";
			mysql_query($scoreUpdatePostive, $linkID);	
			echo "</center>";	
			break;
		}	
		
		//Dash Command
		if($commandBox == "Dash" || $commandBox == "dash"){
			echo "<center>";	
			echo "You dash towards the door, hitting the barrier and breaking down into tiny particles until your measly existence disappears. ";
			mysql_query($scoreUpdateDead, $linkID);
			echo "</center>";	
			break;
		}	
		
		//Talk Command
		if($commandBox == "Talk" || $commandBox == "talk"){
			echo "<center>";	
			echo "'Who are you?'";	
			echo "<br />";
			echo "The man replies 'That's not important. Getting you out of here is.'";
			echo "<br />";
			echo "Suddening a portal opens up in front of you, the man grabs your arm and throws you into it.'";
			echo "<br />";
			echo "You wake up on a hard rock. Lifting your exhausted body, you look around and notice you're high up in the air. Possibly on a mountain.'";
			$currentLocation = 3;
			mysql_query($scoreUpdatePostive, $linkID);	
			mysql_query($locationQuery, $linkID);	
			echo "</center>";	
			break;
			}
		}	
		//Third Location				
		if($row['locationID'] == 3){
			
			//Command List
			echo "<strong>Commands:</strong>";
			echo "<br/> ";
			echo "Inventory";
			echo "<br/> ";
			echo "Stats";
			echo "<br/> ";
			echo "Run";
			echo "<br/> ";
			echo "Look";
			echo "<br/> ";
			echo "Fight";
			echo "<br/> ";
			echo "<br/> ";		
			
			//Run Command
			if($commandBox == "Run" || $commandBox == "run"){
				echo "<center>";	
				echo "You start running down the path, until you hit a invisible barrier.";
				mysql_query($scoreUpdateNegative, $linkID);
				echo "</center>";	
				break;
			}	
			
			//Fight Command
			if($commandBox == "Fight" || $commandBox == "fight"){
				echo "<br/> ";
				echo "Punch";
				echo "<br/> ";
				echo "Kick";
				echo "<br/> ";
				echo "Rip in half";
				echo "<br/> ";
					echo "<center>";	
					echo "You see a giant rat. You're starving and decided to kill the rat for food.";
					mysql_query($scoreUpdatePostive, $linkID);
					echo "</center>";	
				break;
			}			
			
			//Look Command
			if($commandBox == "Look" || $commandBox == "look"){
				echo "<center>";	
				echo "You look around. You notice there is a note stabbed into a rock with a dagger.";
				echo "<br/> ";	
				echo "You imagine the man that managed that feat. <br/> Then you wiggle the dagger out and read the note.";
				echo "<br/> ";	
				echo "'Relax and wait until I've returned with the others.'";
				echo "<br/> ";	
				echo "Others...?";
				mysql_query($scoreUpdatePostive, $linkID);
				echo "</center>";	
				break;
			}
			
			//Run Command
			if($commandBox == "Punch" || $commandBox == "punch"){
				echo "<br/> ";
				echo "Punch";
				echo "<br/> ";
				echo "Kick";
				echo "<br/> ";
				echo "Rip";
				echo "<br/> ";
					echo "<center>";	
					echo "You attempt to punch the rat. The rat bites your hand and runs away.";
					mysql_query($decreaseHealth, $linkID);
					mysql_query($scoreUpdateNegative, $linkID);
					echo "</center>";	
				break;
			}		
			
			//Kick Command
			if($commandBox == "Kick" || $commandBox == "kick"){
				echo "<br/> ";
				echo "Punch";
				echo "<br/> ";
				echo "Kick";
				echo "<br/> ";
				echo "Rip";
				echo "<br/> ";
					echo "<center>";	
					echo "You kick the rat into the wall. You receive raw rat meat.";
					mysql_query($scoreUpdatePostive, $linkID);
					echo "</center>";	
				break;
			}			
			
			//Rip in half Command
			if($commandBox == "Rip" || $commandBox == "rip"){
				echo "<br/> ";
				echo "Punch";
				echo "<br/> ";
				echo "Kick";
				echo "<br/> ";
				echo "Rip";
				echo "<br/> ";
					echo "<center>";	
					echo "You grab the rat and rip it in half. Wasting it's meat and getting its guts all over your hands.";
					mysql_query($scoreUpdateNegative, $linkID);
					echo "</center>";	
				break;
			}							
			
			echo "</p>";
		}
	}	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////Permanent Commands//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		//Inventory Command		
		if($commandBox == "Inventory" || $commandBox == "inventory"){		
			echo "<strong>Inventory:</strong>";
			echo "<br/> ";
  			while($row = mysql_fetch_array($inventory, MYSQL_ASSOC))
			{
				echo $row['itemName'];
				echo "<br/> ";
			}
			break;
		}
		
		
		//Stats Command		
		if($commandBox == "Stats" || $commandBox == "stats"){		
					while($row = mysql_fetch_array($characterStats, MYSQL_ASSOC))
					{

						echo "<strong>";
						echo "Username: ";
						echo $row['username'];
						echo "</strong>";
						echo "<br/>";
						echo "Attack: ";
						echo $row['userAttack'];
						echo "<br/>";
						echo "Defense: ";
						echo $row['userDefense'];
						echo "<br/>";
						echo "Health: ";
						echo $row['userHealth'];
						echo "<br/>";
						echo "<br/>";
						echo "<br/>";

					}
		
			
				}


}	
?>


	<br/>
	<center>


	<form name='commandForm' action='' method='post'>
	  		<input type='text' name='commandBox' style='margin-top: % '/>
	<input type='submit' name='Submit'/>
	</center>

<!--  submit/reset             -->

<p>  


		
	</form>
	
</p>



</body>
</html>