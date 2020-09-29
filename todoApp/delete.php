<?php
include 'inc/session.php';
include 'inc/functions.php';

if(isset($_POST['delete']))
{
  if(delete_task(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT)))
  {

    header('location: task_list.php?msg=Task+Deleted');
    exit;

  } else {
    header('location: task_list.php?msg=Unable+to+Delete+Task');
    exit;
  }
}


 ?>
