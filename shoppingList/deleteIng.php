<?php

  include('model.php');
  $model = new Model();
  $id = $_REQUEST['id'];


  $deleteIns = $model->deleteIns($id);




  if($deleteIns)
  {
    echo "<script>alert('Deleted successfully');</script>";
    //echo "<script>window.location.href = 'records.php';</script>";

    echo "<script>window.history.go(-1);</script>";





  }


 ?>
