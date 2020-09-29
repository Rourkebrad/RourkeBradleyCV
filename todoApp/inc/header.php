<!doctype html>
<html lang="en">
	<head>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	</head>

	<body>

	<header>
			<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
			  <a class="navbar-brand" href="./">
				<img src="inc/img/logo-123ink.png" class="img-fluid" alt="Responsive image"></a>
			 <ul class="nav nav-pills">
				 <?php if(isset($_SESSION['userlogin']) && $_SESSION['userlogin'] !== 'admin'): ?>
					 <li class="nav-item">
 			      <a class="nav-link" href="reports.php">Schedule</a>
 					</li>
					<li class="nav-item">
 			      <a class="nav-link" href="task_list.php">Tasks</a>
 					</li>
					<?php endif ?>
					<?php if(isset($_SESSION['userlogin']) && ($_SESSION['userlogin'] == 'admin' || $_SESSION['userlogin'] == 'Leanne')):  ?>
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile</a>
					</li>

				<?php endif ?>
					<?php if(isset($_SESSION['userlogin'])): ?>

					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout</a>
					</li>
					<?php else: ?>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>

				<?php  endif ?>
				<?php
				if(isset($_SESSION['userlogin']) && $_SESSION['userlogin'] == "admin"):
				 ?>

				<li class="nav-item">
					<a class="nav-link" href="register.php">Signup</a>
				</li>
			<?php endif  ?>
			</nav>
  </header>

<section class="main">
	<div class="container">
