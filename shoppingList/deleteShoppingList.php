<?php

  include('model.php');
  $model = new Model();
  $deleteShop = $model->deleteShoppingList();


  if($deleteShop)
  {
    echo "<script>alert('Deleted successfully');</script>";
    echo "<script>window.location.href = 'list.php';</script>";
  } else {
    echo "Fail";
  }




 ?>
