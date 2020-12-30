<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Recipes</title>
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
         <div class="col-md-12 mt-2">
           <h1 class="text-center">Add a recipe</h1>
           <hr style="height: 1px; color: black; background-color: black;">
         </div>
       </div>

     <div class="row">
       <div class="col-md-5 mx-auto">
         <?php
         include 'model.php';
         $model = new Model();
         $add = $model->add();
         ?>
        <form action="" method="post">
           <div class="form-group row">
             <label for="name1" class="col-sm-2 col-form-label">Name</label>
             <div class="col-sm-10">
             <input type="text" id="name1" name="name" class="form-control">
           </div>
            </div>
           <div class="form-group row">
             <label for="meal" class="col-sm-2 col-form-label">Meal</label>
             <div class="col-sm-10">
             <select name="meal" id="meal" class="form-control">
               <option></option>
               <option value="breakfast">Breakfast</option>
               <option value="lunch">Lunch</option>
               <option value="dinner">Dinner</option>
               <option value="dessert">Dessert</option>
               <option value="snack">Snack</option>
             </select>
           </div>
           </div>
           <div class="form-group">
             <button type="submit" name="submit" class="btn btn-primary">Submit</button>
           </div>
         </form>
       </div>
     </div>
   </div>

    <div class="container">
      <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">Full Recipes</h1>
        <hr style="height: 1px; color: black; background-color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Meal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //include 'model.php';
            //$model = new Model();
            $rows = $model->fetch();
            $i = 1;
            if(!empty($rows))
            {
              foreach($rows as $row)
              {
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['meal']; ?></td>
                  <td>
                    <!--<a href="read.php?id=<?php //echo $row['id']; ?>" class="badge badge-info">Read</a>-->

                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>

                  </td>
                </tr>
                <?php
              }
            } else {
              echo "no data";
            }
            ?>
            <tr>
            </tr>
          </tbody>
        </table>
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
