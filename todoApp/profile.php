<?php
$pageTitle = "Profile - Duties 123ink.ie";
include 'inc/session.php';
include 'inc/header.php';
include 'inc/hideId.php';
include 'inc/functions.php';


//need to look into this
if (isset($_GET['user']))
{
  //unset($_SESSION['id']);
  $_SESSION['id'] = $_GET['user'];
	header('location:profile.php');
}
?>

<?php if(!isset($_SESSION['userlogin'])):  ?>
	<p>You are currently not signed in</p>
<?php else: ?>
	<p >You are logged in as: <br> userlogin: <?php if(isset($userlogin)) {echo $userlogin;}   ?></p>


	<?php

if($_SESSION['userlogin'] == "admin"){?>
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<h2 class="display-4 text-center">Users</h2>
			</tr>
		</thead>
		<tbody>
		<?php
    //profile page for admin
		foreach(listUsers() as $user)
		{
			echo "<tr><td>";
			echo "<a href='reports.php?user=" . $user['id'] . "'>". $user['userlogin'] . "</a>" ;
			echo "</td><td>";
			echo $user['department'] . "</td><td>";
			echo "<a href='task_list.php?user=" . $user['id'] . "'>View tasks</a>";
			echo "</td><td>";
			echo  "<a href='edit-profile.php?user_identity=" .  $encode_id. "'>Edit Profile</a>";
			echo "</td><td>";
			echo "<a href='profile.php?user=5'>Change user to admin</a>";
			echo "</td></tr>";
		}
		}
    //profile page for customer service manager
		if($_SESSION['userlogin'] == "Leanne"){?>
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<h2 class="display-4 text-center">Users - Customer Service</h2>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach(listUsers() as $user)
				{
					if($user['department'] == 'customer service')
					{
					echo "<tr><td>";
					echo "<a href='reports.php?user=" . $user['id'] . "'>". $user['userlogin'] . "</a>" ;
					echo "</td><td>";
					echo $user['department'] . "</td><td>";
					echo "<a href='task_list.php?user=" . $user['id'] . "'>View tasks</a>";
					echo "</td><td>";
					echo "<a href='profile.php?user=8'>Change user to Leanne</a>";
					echo "</td></tr>";
				}
				}
				}

 ?>
		</tbody>
	</table>
</div>

<?php endif  ?>
<?php include("inc/footer.php"); ?>
