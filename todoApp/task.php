<?php
include 'inc/session.php';
require 'inc/functions.php';

$pageTitle = "Add Task | 123ink.ie";
$category_id = $task_id = $title = $date = $description = $deadline = $requested = $due = $comment =  '';


if(isset($_GET['id']))
{


  list($task_id,$title,$date,$description, $deadline, $requested, $category_id, $due, $comment) = get_task(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $user_id = $_SESSION['id'];
  $task_id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
  $category_id =  trim(filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT));
  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
  $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)); //TRIM - REMOVES WHITE SPACE BEFORE AND AFTER
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  $deadline = filter_input(INPUT_POST, 'deadline', FILTER_SANITIZE_STRING);
  $requested = filter_input(INPUT_POST, 'requested', FILTER_SANITIZE_STRING);
  $due = filter_input(INPUT_POST, 'due', FILTER_SANITIZE_STRING);
  $comment = '';

  $dateMatch = explode('/', $date);
  $deadlineMatch = explode('/', $deadline);

  if (!empty($deadline))
  {
    if(empty($category_id) || empty($title) || empty($date) || empty($description) || empty($requested || empty($due)))
    {
      $error_message = 'Please fill in the required fields: Category, Title, Date, Description, Requested By, Due Date';
    } elseif (count($dateMatch) !=3
    || strlen($dateMatch[0]) !=2
    || strlen($dateMatch[1]) !=2
    || strlen($dateMatch[2]) !=4
    || !checkdate($dateMatch[1], $dateMatch[0], $dateMatch[2]))
    {
      $error_message = "Invalid Date";

    }
    elseif(count($deadlineMatch) !=3
    || strlen($deadlineMatch[0]) !=2
    || strlen($deadlineMatch[1]) !=2
    || strlen($deadlineMatch[2]) !=4
    || !checkdate($deadlineMatch[1], $deadlineMatch[0], $deadlineMatch[2]))
    {
      $error_message = "Invalid Date";
    }
    else {
      if(add_task($category_id,$title,$date,$description, $deadline, $requested, $due, $comment, $user_id, $task_id))
      {
        header('Location: task_list.php');
        exit;
      } else {
        $error_message = 'Could not add task';
      }
    }
  } else {
    if(empty($category_id) || empty($title) || empty($date) || empty($description) || empty($requested || empty($due)))
    {
      $error_message = 'Please fill in the required fields: Category, Title, Date, Description, Requested By, Due Date';
    } elseif (count($dateMatch) !=3
    || strlen($dateMatch[0]) !=2
    || strlen($dateMatch[1]) !=2
    || strlen($dateMatch[2]) !=4
    || !checkdate($dateMatch[1], $dateMatch[0], $dateMatch[2]))
    {
      $error_message = "Invalid Date";

    }
    else {
      if(add_task($category_id,$title,$date,$description, $deadline, $requested, $due, $comment, $user_id, $task_id))
      {
        header('Location: task_list.php');
        exit;
      } else {
        $error_message = 'Could not add task';
      }
    }
  }


}

include 'inc/header.php';
?>

<?php if(!isset($_SESSION['userlogin'])):  ?>
  <p>You are currently not signed in</p>
<?php else: ?>
  <br>
  <div class="container">
    <h1 class="display-3 text-center"><?php
    if(!empty($task_id))
    {
      echo "Update";
    } else {
      echo "Add";
    }

    ?>Task</h1>
    <?php
    if (isset($error_message))
    {
      echo "<p class='alert alert-warning' role='alert'>$error_message</p>";
    }
    ?>

    <br>
    <div class="container">
      <form method="post" action="task.php">

        <div class="form-group row">
          <label for="due" class="required col-auto col-form-label">Due Date*</label>

          <select class="custom-select" id="due" name="due">
            <option value="">Select One</option>
            <option value="1.Monday"<?php if ($due == '1.Monday')
            {echo ' selected';
            }?>>1. Monday</option>
            <option value="2.Tuesday"<?php if ($due == '2.Tuesday')
            {echo ' selected';
            }?>>2.Tuesday</option>
            <option value="3.Wednesday"<?php if ($due == '3.Wednesday')
            {echo ' selected';
            }?>>3.Wednesday</option>
            <option value="4.Thursday"<?php if ($due == '4.Thursday')
            {echo ' selected';
            }?>>4.Thursday</option>
            <option value="5.Friday"<?php if ($due == '5.Friday')
            {echo ' selected';
            }?>>5.Friday</option>
            <option value="6.Weekly"<?php if ($due == '6.Weekly')
            {echo ' selected';
            }?>>6.Weekly</option>
            <option value="7.Monthly"<?php if ($due == '7.Monthly')
            {echo ' selected';
            }?>>7.Monthly</option>
            <option value="8.Miscellaneous"<?php if ($due == '8.Miscellaneous')
            {echo ' selected';
            }?>>8.Miscellaneous</option>
          </select>

        </div>
        <div class="form-group row">
          <label for="title"class="required col-auto col-form-label">Title*</label>
          <input type="text" id="title" class="form-control" name="title" value="<?php echo htmlspecialchars($title); ?>" />
        </div>

        <div class="form-group row">
          <label for="description" class="required col-auto col-form-label">Description*</label>
          <textarea type="text" id="description" class="form-control" name="description" rows="5"><?php echo htmlspecialchars($description); ?> </textarea>
        </div>

        <div class="form-group row">
          <label for="deadline" class="required col-auto col-form-label">Deadline</label>

          <input type="text" id="deadline" name="deadline" class="form-control" placeholder="dd/mm/yyyy (leave blank if no deadline)" value="<?php echo htmlspecialchars($deadline); ?>" />
        </div>

        <div class="form-group row">
          <label for="requested" class="col-auto col-form-label required">Requested By*</label>

          <input type="text" id="requested" name="requested" class="form-control" value="<?php echo htmlspecialchars($requested); ?>" />
        </div>

        <div class="form-group row">
          <label for="date" class="col-auto col-form-label required">Date added*</label>

          <input type="text" id="date" name="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>" placeholder="dd/mm/yyyy" />
        </div>

        <div class="form-group row">
          <label for="category_id" class="col-auto col-form-label required">Category*</label>

          <select class="custom-select" name="category_id" id="category_id">
            <option value="">Select One</option>
            <?php

            foreach(get_category_list() as $item)
            {
              echo "<option value='" . $item['category_id'] . "'";
              if ($category_id == $item['category_id'])
              {
                echo ' selected';
              }
              echo ">" . $item['title'] . "</option>";
            }
            ?>
          </select>

        </div>


        <?php if(!empty($task_id))
        {

          echo '<input type="hidden" name="id" value="' . $task_id . '" />';
        }?>
        <div class="text-center">
          <input class="btn btn-primary" type="submit" value="Submit" />
        </div>
      </form>
    </div>


  </div>
<?php endif  ?>


<?php include "inc/footer.php"; ?>
