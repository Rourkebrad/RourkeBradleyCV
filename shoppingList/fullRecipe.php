<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <title>Full Recipe</title>
  </head>
  <body>
    <?php
    include('inc/nav.php');
    include 'model.php';
    $model = new Model();
    $id = $_REQUEST['id'];
    $row = $model->fetch_single($id);
    $getIngs = $model->fetchIng();
    $getIns = $model->fetchIns();
    ?>
    <div class="container pt-5">
      <div class="py-3">
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <h1 class="text-center"><?php echo $row['name'];  ?></h1>
          <hr style="height: 1px; color: black; background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <h2 class="text-center py-3"><u>Ingredients</u></h2>
          <?php foreach($getIngs as $ings)
          {
            if($ings['id_recipe'] == $id)
            {
            echo "<p>" .  $ings['ingredient'] . "<p>";
            }
          }   ?>

        </div>
        <div class="col-md-5 mx-auto">
          <h2 class="text-center py-3"><u>Instructions</u></h2>
          <?php
          foreach($getIns as $ins)
          {
            if($ins['id_ins'] == $id)
            {
            echo "<p>" .  $ins['instruction'] . "<p>";
            }
          }   ?>

        </div>
      </div>
      <div class="row">
        <div class="col-sm mx-auto text-center">
          <h3 class="text-center py-3"><u>Tags</u></h3>
          <?php echo $row['tag']; ?>
        </div>
        <div class="col-sm mx-auto text-center">
          <h3 class="text-center py-3"><u>Servings</u></h3>
          <?php echo $row['yield']; ?>
        </div>
        <div class="col-sm mx-auto text-center">
          <h3 class="text-center py-3"><u>Author</u></h3>
          <?php echo $row['source']; ?>
        </div>
      </div>

      <div class="row py-5">
        <div class="col-sm mx-auto text-center">
        </div>
        <div class="col-sm mx-auto text-center">
    <img class=" img-fluid" src="images/<?php echo $row['recipeImage']; ?>" alt="meal picture">
      </div>
      <div class="col-sm mx-auto text-center">
      </div>
      </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
