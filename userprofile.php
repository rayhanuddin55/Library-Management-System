<?php
	session_start();
	if(!$_SESSION["id"]){
		header('location:index.php');
	}
	else{
		
	}
?>


<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	
</head>
    <body>
		<div class="container">
			<div class="col-md-12 column">
				<?php include('nav_user.php') ?>
			</div>
			
			<div class="col-md-6">
				<fieldset class="scheduler-border">
				
				<?php 
					$UserIdd=$_SESSION["id"];
				
					require_once "config.php";
					$db=get_connection();
					$sql = "SELECT Name, Email, StudentId, Gender, About FROM user where StudentId='$UserIdd'";
					$result = mysql_query($sql);
					//echo"Connection get";
					
					while($rows = mysql_fetch_array($result)){
						$Name = $rows['Name'];
						$StudentId = $rows['StudentId'] ;
						$Email = $rows['Email'] ;
						$Gender = $rows['Gender'] ;
						$About = $rows['About'] ;
					}					
					
										
					echo '<legend class="scheduler-border">' ;
					
					echo "Personal Information"."</legend>";
					echo "Name: ".$Name."</br>";
					echo "ID: ".$StudentId."</br>" ;		
					echo "Email: ".$Email."</br>";
					echo "Gender: ".$Gender."</br>";
					echo "About: ".$About."</br>";
										
					//mysql_close($db);					
										
					?>
				</fieldset></br>
				<a href="edit_user_account.php"><input type="sumbit" class="btn btn-primary" value="Edit Profile"></a>
			</div>
			
		
		</div>
	</body>		
</html>












