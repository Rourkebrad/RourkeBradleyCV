<?php
$pageTitle = "Duties";
include 'inc/session.php';
include 'inc/header.php';
include 'inc/functions.php';
?>

<!-- only authorise to be viewed if session userlogin is set -->
<?php if(!isset($_SESSION['userlogin']) || $_SESSION['userlogin'] == 'admin'):  ?>
	<p>Please login to view this page.</p>
	<p><u>Login</u></p>
	<p>Username: test <br> Password: test</p>
<?php else: ?>
	<div class="container text-center">
		&nbsp;
		&nbsp;
		&nbsp;
		<h1>Duties</h1>
		&nbsp;&nbsp;
		<div class="row">
			<div class="col">
				<div class="card text-center">
					<a href="task.php"><i class="fa fa-tasks" style="font-size:60px;color:blue"></i>
						<div class="card-body">
							<p class="card-text">Add task</p></a>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card text-center">
						<a href="project.php"><i class="fa fa-tasks" style="font-size:60px;color:blue"></i>
							<div class="card-body">
								<p class="card-text">Add Category</p></a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card text-center" >
							<a href="reports.php"><i class="fa fa-tasks" style="font-size:60px;color:blue"></i>
								<div class="card-body">
									<p class="card-text">View Schedule</p></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif  ?>

			<?php include("inc/footer.php"); ?>
