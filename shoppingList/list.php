<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Shopping List</title>
  </head>
  <body class="bg-light">
    <?php
    include('inc/nav.php');
     ?>
     <div>
       <br>
       <br>
       <br>
     </div>

    <div class="container">
      <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">Shopping List</h1>
        <hr style="height: 1px; color: black; background-color: black;">
      </div>
    </div>
    <div class="row">

        <div class="col-md-5 mx-auto">
          <table class="table table-sm">
            <thead>
          <h5>Recipes</h5>
          <tr>
            <th>ID</td>
              <th>Name</th>
            </tr>
            <thead>
              <tbody>
                  <?php
                  include 'model.php';
                  $model = new Model();
                  $allRecipes = $model->fetch();
                  $allShopping = $model->addToShopping();
                  $x = 1;

                  if(!empty($allRecipes))
                  {
                    foreach($allRecipes as $recipes)
                    {
                      ?>
                      <tr>
                        <td><?php echo $x++; ?></td>
                        <td><?php echo $recipes['name']; ?></td>
                        <form action="" method="post">
                        <input type="hidden" name="shop" value="<?php echo $recipes['id'];  ?>">
                        <td><button type="submit" name="addToShopping" class="btn btn-primary btn-sm">Add</button></td>
                      </form>
                      </tr>
                      <?php
                    }
                  }
                  ?>
              </tbody>
        </table>
        </div>
      <div class="col-md-5 mx-auto">
        <table class="table table-sm">
          <thead>
            <h5>Shopping List</h5>
            <tr>
              <th>ID</th>
              <th>Ingredient</th>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $rows = $model->fetchAllIngsMatched();

            $i = 1;
            if(!empty($rows))
            {
              foreach($rows as $row)
              {
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['ingredient']; ?></td>
                  <td><?php echo $row['name']; ?></td>

                </tr>
                <?php
              }
            } 
            ?>

          </tbody>

        </table>
        <a href="shoppingList.php" class="badge badge-success">View / Send to Email Address</a>
        <a href="deleteShoppingList.php" class="badge badge-danger">Delete Shopping List</a>
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
