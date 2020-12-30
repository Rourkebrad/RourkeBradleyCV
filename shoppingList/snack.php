<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Snack Recipes</title>
  </head>
  <body class="bg-light">
<?php
include('inc/nav.php');
?>

    <div class="container pt-5 ">
      <div class="py-3">
      </div>

          <?php
          include 'model.php';
          $model = new Model();
          $snack = $model->fetch();
          ?>

      <hr style="height: 1px; color: black; background-color: black;">
      <div class="row">

        <?php

        foreach ($snack as $meal)
        {

          if($meal['meal'] == 'snack')
          {
         ?>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo ucwords($meal['name']);  ?></h5>
              <a href="fullRecipe.php?id=<?php echo $meal['id']; ?>">
            <!--    <div class="embed-responsive embed-responsive-16by9">
            <img class="card-img-top embed-responsive-item" src="images/<?php echo $meal['recipeImage']; ?>" alt="meal picture">
          </div> -->
            </a>
              <a href="fullRecipe.php?id=<?php echo $meal['id']; ?>" class="btn btn-primary mt-2">See Recipe</a>
            </div>
          </div>
        </div>

      <?php }
    }
      ?>

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
