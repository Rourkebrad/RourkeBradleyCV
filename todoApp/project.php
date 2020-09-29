<?php
include_once 'inc/session.php';
require 'inc/functions.php';
$pageTitle = "Categories | Duties 123ink.ie";
$title =  '';

if(isset($_POST['delete']))
{
  if(delete_category(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT)))
  {
    header('location: project.php?msg=Category+Deleted');
    exit;
  } else {
    header('location: project.php?msg=Unable+to+Delete+Category');
    exit;
  }
}

if(isset($_GET['id']))
{
  $category_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  list($category_id,$title) = get_category($category_id);
}

if (isset($_GET['msg']))
{
  $error_message = trim(filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $category_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)); //TRIM - REMOVES WHITE SPACE BEFORE AND AFTER

  if(empty($title))
  {
    $error_message = 'Please fill in the required fields: Title';
  } else {
    if(add_category($title, $category_id))
    {
      header('Location: project.php');
      exit;
    } else {
      $error_message = 'Could not add category';
    }
  }
}

include 'inc/header.php';
?>
<?php if(!isset($_SESSION['userlogin'])):  ?>
  <p>You are currently not signed in</p>
<?php else: ?>
<div class="container">
  <div class="col-container page-container">
    <div class="col col-70-md col-60-lg col-center">
      <h1 class="actions-header"><?php
      if(!empty($category_id))
      {
        echo "Update";

      } else {
        echo "Add";
      }
      ?> Category</h1>
      <?php
      if (isset($error_message))
      {
        echo "<p class='alert alert-warning' role='alert'>$error_message</p>";
      }
      ?>

      <br>
      <form class="form-group" method="post" action="project.php">
        <table>
          <tr>
            <th><label for="title" class="required col-auto col-form-label">Title*</label></th>
            <td><input type="text" id="title" class="form-control" name="title" value="<?php echo $title; ?>" /></td>

            <?php if(!empty($category_id))
            {
              echo '<input type="hidden" name="id" value="' . $category_id . '" />';
            }?>
            <input class="btn btn-primary btn-sm float-right" type="submit" value="Submit" />
          </tr>

        </table>
      </form>
    </div>
    <hr>

    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <h2 class="display-4 text-center">Categories</h2>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach(get_category_list() as $item)
          {
            echo "<tr><td>";
            echo "<a href='project.php?id=" . $item['category_id'] . "'>" . $item['title'] .  "</a>";
            echo "</td>";
            echo "<td>";
            echo "<form method='post' action='project.php' onsubmit=\"return confirm('Are you sure you want to delete this category?');\" >";
           echo "<button type='submit' class='btn btn-danger btn-sm float-right'  value='" . $item['category_id'] . "' name='delete'>Delete</button>";
            echo "</form";
            echo "</td>";
            echo "</tr>";

          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <?php endif  ?>

<?php include "inc/footer.php"; ?>
