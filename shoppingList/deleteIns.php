<?php

  include('model.php');
  $model = new Model();
  $id = $_REQUEST['id'];

  $deleteInstruct = $model->deleteInstruct($id);

  if($deleteInstruct)
  {
    echo "<script>alert('Deleted successfully');</script>";
    //echo "<script>window.location.href = 'records.php';</script>";
    echo "<script>window.history.go(-1);</script>";
  }

 ?>
