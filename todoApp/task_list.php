<?php
include 'inc/functions.php';
include 'inc/session.php';
include 'inc/hideId.php';


$pageTitle = "Task List | 123ink.ie";
//$tests = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT);


//need to look into this
if (isset($_GET['user']))
{
  //unset($_SESSION['id']);
  $_SESSION['id'] = $_GET['user'];
  header('location:task_list.php');
}


if (isset($_GET['msg']))
{
  $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

include 'inc/header.php';
?>

<?php if(!isset($_SESSION['userlogin'])):  ?>
  <p>You are currently not signed in</p>
<?php else: ?>
  <?php if($_SESSION['userlogin'] == 'admin' || $_SESSION['userlogin'] == 'Leanne'){ ?>
  <p>You are logged in as: <br> userlogin: <?php if(isset($userlogin)) {echo $userlogin;}   ?></p>
  <?php }   ?>
  &nbsp;
  &nbsp;
  &nbsp;

  <div class="container">
    <div class="container">
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
          </div>
        </div>
        <br>
        <br>
        <br>

        <?php
        if (isset($error_message))
        {
          echo "<p class='alert alert-warning' role='alert'>$error_message</p>";
        }
        ?>

        <div class="container">
          <table class="table table-striped">
            <thead>
              <tr>
                <h2 class="display-4 text-center">Tasks</h2>
              </tr>
            </thead>
            <tbody>

              <?php

              foreach(get_task_list() as $item)
              {
                if(isset($_GET['user']))
                {
                if($item['id'] == $_GET['user'])
                {
                  echo "<tr><td>";

                  echo "<a href='task.php?id=" . $item['task_id'] . "'>" . $item['title'] . "</a>";
                  echo "</td>";
                  echo "<td>";
                  echo "<form method='post' action='delete.php' onsubmit=\"return confirm('Are you sure you want to delete this task?');\" >";
                 echo "<button type='submit' class='btn btn-danger btn-sm float-right'  value='" . $item['task_id'] . "' name='delete'>Delete</button>";
                  echo "</form";
                  echo "</td></tr>";
                }
              } else {
                if($item['id'] == $_SESSION['id'])
                {
                echo "<tr><td>";

                echo "<a href='task.php?id=" . $item['task_id'] . "'>" . $item['title'] . "</a>";
                echo "</td>";
                echo "<td>";
                echo "<form method='post' action='delete.php' onsubmit=\"return confirm('Are you sure you want to delete this task?');\" >";
              echo "<button type='submit' class='btn btn-danger btn-sm float-right'  value='" . $item['task_id'] . "' name='delete'>Delete</button>";
                echo "</form";
                echo "</td></tr>";
              }
              }
            }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    <?php endif  ?>
    <?php include("inc/footer.php"); ?>
