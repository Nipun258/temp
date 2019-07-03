<?php
include_once 'inc/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<!--Responsive design-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
				<ul class="navbar-nav ">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="jumbotron text-center">
			<h1>Exam Management System</h1>
			<p>University of Kelaniya</p>
			</div><!--jumbotron text-center-->
			<div class="container">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">New</button>
				<a class="btn btn-primary" href="select.php" role="button">View Record</a>

				<br><br>
				<?php
                      
          if(isset($_GET['error'])){
           

               if($_GET['error'] == "emptyfields"){
                echo '<div class="alert alert-danger" role="alert">
                 please fill out all feild</div>';


               }

               }

          else if(isset($_GET['succes'])){
                if($_GET['succes'] == "done"){
                echo '<div class="alert alert-success" role="alert">
                 Record Add sucessfully</div>';
                 header( "refresh:10;url=index.php");
               }

          }


			?>
			</div>
			
			<!-- /.container -->
			
			<!-- Modal scroll content-->
			<div class="modal fade bg-dark" tabindex="-1" id="ModalAdd" role="dialog">
				<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="process.php">
							<div class="modal-header">
								<h5 class="modal-title">Add New Exam</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="acadamicYear" class="col-sm-4 control-label">Acadamic Yaer</label>
									<div class="col-sm-10">
										<select name="acadamicYear" class="form-control" id="acadamicYear">
											<option value="">Choose Academic year</option>
											<option>2016/2017</option>
                                            <option>2017/2018</option>
											<option>2018/2019</option>
											<option>2019/2020</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="semester" class="col-sm-4 control-label">Semester</label>
									<div class="col-sm-10">
										<select name="semester" class="form-control" id="semester">
											<option value="">Choose semester</option>
											<option>1</option>
											<option>2</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="department" class="col-sm-4 control-label">Department</label>
									<div class="col-sm-10">
										<select name="department" class="form-control" id="department">
											<option value="">Choose Department</option>
											<option>Archaeology</option>
											<option>Geography</option>
											<option>Econ</option>
											<option>History</option>
											<option>International Studies</option>
											<option>Mass Communication</option>
											<option>Library And Information Science</option>
											<option>Philosophy</option>
											<option>Political Science</option>
											<option>Sociology</option>
											<option>Social Statistics</option>
											<option>Sport Science And Physical Education</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="date" class="col-sm-4 control-label">Exam Date</label>
									<div class="col-sm-10">
										<input type="date" name="date" class="form-control" id="date" placeholder="Exam Date">
									</div>
								</div>
								<div class="form-group">
									<label for="courseCode" class="col-sm-4 control-label">Course Code</label>
									<div class="col-sm-10">
										<input type="text" name="courseCode" class="form-control" id="courseCode" placeholder="Course Code">
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="timeStart" class="col-sm-4 control-label">Start Time</label>
											<div class="col-sm-8">
												<input type="time" name="timeStart" class="form-control" id="timeStart">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="timeEnd" class="col-sm-4 control-label">End Time</label>
											<div class="col-sm-8">
												<input type="time" name="timeEnd" class="form-control" id="timeEnd">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="location" class="col-sm-4 control-label">Exam Location</label>
									<div class="col-sm-10">
										<<select name="location" class="form-control" id="location">
											<option value="">Choose Exam hall</option>
											<option>K1 Hall</option>
											<option>K3 Hall</option>
											<option>Kanunwala Hall</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-5">
										<div class="form-group">
											<label for="firstStudent" class="col-sm-8 control-label">First Candidate</label>
											<div class="col-sm-12">
												<input type="text" name="firstStudent" class="form-control" id="firstStudent" placeholder="First Candidate">
											</div>
										</div>
									</div>
									<div class="col-5">
										<div class="form-group">
											<label for="repeatStudent" class="col-sm-8 control-label">Repeat Candidate</label>
											<div class="col-sm-12">
												<input type="text" name="repeatStudent" class="form-control" id="repeatStudent" placeholder="Repeat Candidate">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- // Modal scroll contet -->
		</body>
	</html>