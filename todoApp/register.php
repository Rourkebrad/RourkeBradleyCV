<?php
include 'inc/functions.php';
include 'inc/session.php';
include 'inc/header.php';

//check if error array is empty, if yes process form data and insert record
if(isset($_POST['signupBtn']))
{
  //collect form data and store in variables
  $department = $_POST['department'];
  $userlogin = $_POST['userlogin'];
  $password = $_POST['password'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  if (add_user( $department,$userlogin, $hashed_password))
  {
    $result = "<p style='padding:20px; color: green;'>Successful</p>";
    ?>
        <script>
        window.location = "/todoApp/index.php";
        </script>
        <?php
  }
}

$pageTitle = "Register - Duties 123ink.ie";


if(isset($_SESSION['userlogin']) && $_SESSION['userlogin'] == "admin"):
 ?>

<h3>Add a user</h3>

<?php if(isset($result)) {echo $result;}   ?>

<form method="post" action="">
  <table>
    <tr><td>Department:</td> <td><input type="text" value="" name="department"></td></tr>
    <tr><td>User:</td> <td><input type="text" value="" name="userlogin"></td></tr>
    <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
    <tr><td></td> <td><input type="submit" name="signupBtn" value="Login"></td></tr>
  </table>
</form>

<p><a href="index.php">Back</a></p>

<?php endif ?>


<?php include("inc/footer.php"); ?>
