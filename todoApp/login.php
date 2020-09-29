<?php
$pageTitle = "Login - Duties 123ink.ie";
include 'inc/session.php';
include 'inc/functions.php';
include 'inc/header.php';

if(isset($_POST['loginBtn']))
{
  //collect form data
  $user = $_POST['userlogin'];
  $password = $_POST['password'];

  //check if user exists in the database
  check_login($user,  $password);

}
?>
<h3>Login</h3>

<form method="post" action="">
  <table>

    <tr><td>User:</td> <td><input type="text" name="userlogin" value="" required></td></tr>
    <tr><td>Password:</td> <td><input type="password" name="password" value="" required></td></tr>
    <tr><td></td> <td><input type="submit" name="loginBtn" value="Login"></td></tr>
  </table>
</form>

<p><a href="index.php">Back</a></p>

<?php include("inc/footer.php"); ?>
