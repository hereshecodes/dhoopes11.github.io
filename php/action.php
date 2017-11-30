<?php

	if(isset($_POST['submit']))
	{
			$dbuser = "";
			$dbpass = "";
			$dbhost = "";
			$dbname  = "";
		
			// Create connection
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      
			// Check connection
			if (!$conn) 
			{
			    die("Connection failed: " . mysqli_connect_error());
			}
			else
			{
			echo "Connected successfully";
		   }
		
		    $pass = PASSWORD_HASH($_POST["pasd"], PASSWORD_BCRYPT);
			
			$sql = "INSERT INTO USER_ACCT
						(FNAME, LNAME,EMAIL,PASSWORD)           
					  VALUES 
			     ('".$_POST["fname"]."',
				  '".$_POST["lname"]."',
				  '".$_POST["email"]."',
				  '".$_POST["pass"]."')";
	
		  
			if(mysqli_query($conn, $sql))
			{
				echo "New record created";
				header("Location:");
			}
			else
			{
				echo "error: " .$sql . "<br>" .mysqli_error($conn);
			}
		
		}
	
		mysqli_close($conn);
		?>