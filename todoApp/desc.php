<?php
$pageTitle = "Update Description | 123ink.ie";
include 'inc/functions.php';
include 'inc/session.php';

if(isset($_GET['id']))
{

  list($task_id,$title,$date,$description, $deadline, $requested, $category_id, $due, $comment) = get_task(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $task_id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
  $category_id = trim(filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT)); //TRIM - REMOVES WHITE SPACE BEFORE AND AFTER
  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
  $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)); //TRIM - REMOVES WHITE SPACE BEFORE AND AFTER
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  $deadline = filter_input(INPUT_POST, 'deadline', FILTER_SANITIZE_STRING);
  $requested = filter_input(INPUT_POST, 'requested', FILTER_SANITIZE_STRING);
  $due = filter_input(INPUT_POST, 'due', FILTER_SANITIZE_STRING);
  $comment = '';

  if(update_description($description, $task_id))
  {
    header('Location: reports.php');
    exit;
  } else
  {
    $error_message = 'Could not update description';
  }

}
include 'inc/header.php';
?>
<?php if(!isset($_SESSION['userlogin'])):  ?>
  <p>You are currently not signed in</p>
<?php else: ?>
  <br>
  <div class="container">
    <h1 class="display-3 text-center">Update Description</h1>
    <?php
    if (isset($error_message))
    {
      echo "<p class='alert alert-warning' role='alert'>$error_message</p>";
    }
    ?>
    <br>
    <div class="container">
      <form method="post" action="desc.php">
        <div class="form-group row">
          <textarea type="text" id="description" class="form-control" name="description" rows="10"><?php echo htmlspecialchars($description); ?> </textarea>
        </div>

        <?php if(!empty($task_id))
        {
          echo '<input type="hidden" name="id" value="' . $task_id . '" />';
        }?>
        <div class="text-center">
          <input class="btn btn-danger" type="submit" onClick="location.href='reports.php'" value="Back" />
          <input class="btn btn-primary" type="submit" onClick="location.href='reports.php'" value="Update" />
        </div>
      </form>
    </div>


  </div>
<?php endif  ?>
<?php include "inc/footer.php"; ?>
