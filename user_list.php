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
    <title>CurrentBorrows</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>
    <body>
		<div class="container">
			
				<div class="col-md-12 column">
					<?php include('nav_admin.php') ?>
				</div>
				
				<div class="container margint2">
					<h3> search for books </h3>
											
					<div class=" container col-md-12">
						<fieldset>
							<form name="search_form" method="POST" action="#">
								<input type="text" class="form-control" placeholder="Enter Name or Id or Gender" name="search_box"></br>
								<input type="submit" class="btn btn-primary" placeholder="Text input" value="Search" name="search">
							
							</form>
						</fieldset>
					</div>
					
				
				</div>
				</br></br>
				

				<div>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
							  
								<th>Name</th>
								<th>Email</th>
								<th>Student Id</th>
								<th>Gender</th>
								<th>About</th>
								<th>Edit</th>
							</tr>
							 <tbody>



                        <?php 
									
								require_once "config.php";
								$db= get_connection();
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM user";
								
								//echo"Connection get";
								
								if (isset($_POST['search'])){
									$search_term = $_POST['search_box'];
									$sql .= " WHERE Name = '{$search_term}'";
									$sql .= " OR StudentId = '{$search_term}'";
									$sql .= " OR Gender = '{$search_term}'";
								}
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{									
									echo '<tr class="even gradeC">';
									echo '<td>'.$row["ID"].'</td>';
									echo '<td>'.$row["Name"].'</td>';
									echo '<td>'.$row["Email"].'</td>';
									echo '<td>'.$row["StudentId"].'</td>'; 
									echo '<td>'.$row["Gender"].'</td>';
									echo '<td>'.$row["About"].'</td>'; 
									$url="delete_user.php?id=".$row["StudentId"];
									
									echo '<td>'.'<a class=" btn btn-primary" href='. $url.'>Delete</a>'.'</td>';	
									
									echo '</tr>';
									
										
								}
								mysql_close($db);

									
						?>

                    </tbody>
							
						</thead>
						<tbody>

						</tbody>
						</table>
				</div>


			</div>
	
		</div>
	</body>
</html>
