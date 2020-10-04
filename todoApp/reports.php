<?php
$pageTitle = "Schedule | Duties 123ink.ie";
include 'inc/session.php';
require 'inc/functions.php';
include 'inc/hideId.php';

$filter = 'all';


//need to look into this
if (isset($_GET['user']))
{
  //unset($_SESSION['id']);
  $_SESSION['id'] = $_GET['user'];
  header('location:reports.php');
}


if (!empty($_GET['filter']))
{
  $filter = explode(':', filter_input(INPUT_GET, 'filter' , FILTER_SANITIZE_STRING));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $task_id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
  $comment = trim(filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING)); //TRIM - REMOVES WHITE SPACE BEFORE AND AFTER
  $checkboxAns = trim(filter_input(INPUT_POST, 'checkboxAns', FILTER_SANITIZE_STRING));
}


if (isset($checkboxAns) && $checkboxAns == 1)
{
  $checkboxAns = 1;
  update_comment($comment,$checkboxAns, $task_id);
}

if (isset($comment))
{
  update_comment($comment,$checkboxAns, $task_id);
}

if(isset($_POST["reset"]))
{

  clear_form($task_id);
}


include 'inc/header.php';
?>
<?php if(!isset($_SESSION['userlogin'])):  ?>
  <p>You are currently not signed in</p>
<?php else: ?>
  <?php if($_SESSION['userlogin'] == 'admin'){ ?>
  <p>You are logged in as: <br> userlogin: <?php if(isset($userlogin)) {echo $userlogin;}   ?></p>
  <?php }   ?>
  <div class="container">
    <div class="">
      <div class="col-container">
        <h1 class='actions-header'></h1>
        <form class="" action="reports.php" method="get">
          <label for='filter'>Filter:</label>
          <select id="filter" name="filter">
            <option value="">Select One</option>
            <optgroup label="Due Date">
              <option value="due:1.Monday">1.Monday</option>
              <option value="due:2.Tuesday">2.Tuesday</option>
              <option value="due:3.Wednesday">3.Wednesday</option>
              <option value="due:4.Thursday">4.Thursday</option>
              <option value="due:5.Friday">5.Friday</option>
              <option value="due:6.Weekly">6.Weekly</option>
              <option value="due:7.Monthly">7.Monthly</option>
              <option value="due:8.Miscellaneous">8.Miscellaneous</option>
            </optgroup>
            <optgroup label="Category">
              <?php
              foreach (get_category_list() as $item)
              {

                echo '<option value="category:' . $item['title'] . '">' . $item['title'] . "</option>\n";

              }
              ?>
            </optgroup>
            <optgroup label="Deadline">
              <?php

              foreach (get_due_list() as $item)
              {
                if($item['id'] == $_SESSION['id']){
                if($item['deadline'] !== '')
                {
                  echo '<option value="deadline:' . $item['deadline'] . '">' . $item['deadline'] . "</option>\n";
                }
              }
           }
              ?>

            </optgroup>
          </select>
          <input class="button" type="submit" value="Go" />
        </form>
      </div>

      <div class="container">

          <table class=" table table-striped">
            <?php

            $due =  "none";
            $tasks = get_task_list($filter);
            foreach($tasks as $item)
            {
              if($item['id'] == $_SESSION['id'] )
              {
                if ($due != $item['due'])
                {

                  $due = $item['due'];
                  echo "<thead class='bg-warning'>";
                  echo "<tr>";
                  echo "<th>" . "</th>";
                  echo "<th>" . $item['due'] . "</th>";
                  echo "<th>Deadline</th>";
                  echo "<th>Requested</th>";
                  echo "<th>Category</th>";
                  //echo "<th>Date Added</th>";
                  echo "<th class='text-danger'>Comments</th>";
                  echo "<th class='text-danger'>Completed</th>";
                  echo "<th></th>";
                  echo "<th></th>";
                  echo "<th></th>";
                  echo "</tr>";
                  echo "</thead>";
                }

                echo "<tr>";
                echo "<td><a href='desc.php?id=" . $item['task_id'] . "'role='button' class='btn btn-info btn-sm'>Open</a></td>";
                echo "<td>" . $item['title'] . "</td>";

                if ($item['deadline'] == "")
                {
                  echo "<td>None</td>";
                } else
                {
                  echo "<td>" . $item['deadline'] . "</td>";
                }
                echo "<td>" . $item['requested'] . "</td>";
                echo "<td>" . $item['category'] . "</td>";
                //echo "<td>" . $item['date'] . "</td>";

                ?>
                <form method="post" action="reports.php">
                  <td><input type="text" id="comment" name="comment" value="<?php echo htmlspecialchars($item['comment']); ?> "> </td>
                  <?php echo '<input type="hidden" name="id" value="' . $item['task_id'] . '" />';?>
                  <td><input type="checkbox" id="checkboxAns" name="checkboxAns" value="1"  <?php if($item['checkboxAns'] == 1)  {echo 'checked';}?>> </td>
                 <?php echo "<td><a href='task.php?id=" . $item['task_id'] . "'>Update</a></td>"; ?>
                  <td> <button type='submit' name='save' class='btn btn-outline-success btn-sm'>Save</button> </td>
                  <td> <button type='submit' name='reset' class='btn btn-outline-danger btn-sm' >Clear</button> </td>


                  <?php
                  echo "</tr>\n";
                  if(next($tasks)['due']!= $item['due'])
                  {
                    echo "<tr></tr>";
                    echo "<tr></tr>";

                    //echo "<th class='text-primary'>" .$item['due'] . "</th>";

                  }
                  echo "</form>";
                }
              }
              ?>

            </table>
          </div>

      </div>
    </div>
  <?php  endif ?>

  <?php include "inc/footer.php"; ?>
