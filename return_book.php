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
    <title>Return Book</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<?php include('header.php') ?>
	
</head>
    <body>
		<div class="container">
							<div class="col-md-12 column">
								<?php include('nav_admin.php') ?>
							</div>
							
							<div class="container margint2">
					<h3> Search For Books </h3>
				
					</div>
					<div class=" container col-md-12">
						<fieldset>
							<form name="search_form" method="POST" action="#">
								<input type="text" class="form-control" placeholder="Enter Book Name or User Id or Return Date" name="search_box"></br>
								<input type="submit" class="btn btn-primary" placeholder="Text input" value="Search" name="search">
							
							</form>
						</fieldset>
					</div>
							
							<!-- 2nd Row-->
							
									<div class="col-md-12">
										<br>
											<caption><h3>Todays Expected Return Book</h3></caption>
											<table class="table">
												<thead>
													<tr>
														<th>Borrow Id</th>				  
														<th>Book Name</th>
														<th>Edition</th>
														
														<th>IssueDate</th>
														<th>ReturnDate</th>
														<th>User Id</th>
														<th>Submit</th>
													</tr>
													
												</thead>
												<tbody>

													<?php 
															require_once "config.php";
															$db= get_connection();
															//$id=$_SESSION['id'];
															//$tdate= getdate();
															$sql ="SELECT  * FROM borrow";
														
														//echo"Connection get";
														
															if (isset($_POST['search'])){
																$search_term = $_POST['search_box'];
																$sql .= " WHERE title = '{$search_term}'";
																$sql .= " OR userId = '{$search_term}'";
																$sql .= " OR RerurnDate = '{$search_term}'";
															}
															
															$sql .=" ORDER BY BorrowId DESC";
														
															$result = mysql_query($sql);
															
															while($row=mysql_fetch_array($result))
															{									
																echo '<tr class="even gradeC">';
																echo '<td>'.$row["BorrowId"].'</td>';
																echo '<td>'.$row["title"].'</td>';
																echo '<td>'.$row["edition"].'</td>'; 
																echo '<td>'.$row["IssueDate"].'</td>';
																echo '<td>'.$row["RerurnDate"].'</td>';
																echo '<td>'.$row["userId"].'</td>';
																
																$url="delete_borrow.php?id=".$row["BorrowId"];
																echo '<td>'.'<a class="btn btn-primary" href='. $url.'>Submit</a>'.'</td>';
																
																
																echo '</tr>';
																
																	
															}
															mysql_close($db);

																
													?>

												</tbody>
										
											</table>
										
										
									</div>
									
									
									
							
						
						
		</div>
	</body>		
</html>












