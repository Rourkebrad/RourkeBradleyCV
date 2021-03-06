<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <title>Shopping List</title>
  </head>
  <body class="bg-light">
<?php
include('inc/nav.php');
?>

    <div class="container pt-5">
      <div class="py-3">
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <h1 class="text-center">Recipes</h1>
          <hr style="height: 1px; color: black; background-color: black;">
        </div>
      </div>
          <?php
          include 'model.php';
          $model = new Model();
          $add = $model->add();
          ?>

      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Breakfast</h5>
              <a href="breakfast.php">
              <img class="card-img-top img-fluid img-thumbnail" src="img/breakfast5.jpg" alt="breakfast">
            </a>
              <a href="breakfast.php" class="btn btn-primary mt-2">See Recipes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Lunch</h5>
              <a href="lunch.php">
              <img class="card-img-top img-fluid img-thumbnail" src="img/lunch5.jpg" alt="lunch">
            </a>
              <a href="lunch.php" class="btn btn-primary mt-2">See Recipes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Dinner</h5>
              <a href="dinner.php">
              <img class="card-img-top img-fluid img-thumbnail" src="img/dinner5.jpg" alt="dinner">
            </a>
              <a href="dinner.php" class="btn btn-primary mt-2">See Recipes</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Dessert</h5>
              <a href="dessert.php">
              <img class="card-img-top img-fluid img-thumbnail" src="img/dessert5.jpg"  alt="dessert">
            </a>
              <a href="dessert.php" class="btn btn-primary mt-2">See Recipes</a>
            </div>
          </div>
        </div>

      <div class="col-sm-6">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title">Snacks</h5>
            <a href="snack.php">
            <img class="card-img-top img-fluid img-thumbnail" src="img/snack5.jpg"  alt="snacks">
          </a>
            <a href="snack.php" class="btn btn-primary mt-2">See Recipes</a>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="py-2">
    </div>

    <?php
    include('inc/footer.php');
    ?>




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
