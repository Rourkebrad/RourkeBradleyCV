<?php
$pageTitle = "Edit Profile";
include_once 'inc/session.php';
include_once 'inc/header.php';
include_once 'inc/hideId.php';



if(!isset($_SESSION['userlogin'])): ?>
<div class="container">
<p>You are not authorised to view this page. <a href="login.php">Login</a></p>
<?php else: ?>
  <form method="post" action="">
    <div class="form-group">
      <label for="departmentField">Department</label>
      <input type="text" name="department" class="form-control" id="departmentField" value="<?php if(isset($department)) echo $department; ?>">
    </div>

    <div class="form-group">
      <label for="userloginField">userlogin</label>
      <input type="text" name="userlogin" value="<?php if(isset($userlogin)) echo $userlogin; ?>" class="form-control" id="userloginField">
    </div>
    <div class="form-group">
      <label for="passwordField">Password</label>
      <input type="text" name="password" value="<?php if(isset($password)) echo $password; ?>" class="form-control" id="passwordField">
    </div>
    <input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id;  ?>">
    <button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right">Update Profile</button>
  </form>
<?php endif ?>

<p><a href="index.php">Back</a>   </p>
</div>
<?php
