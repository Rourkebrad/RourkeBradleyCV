<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Edit recipe</title>
  </head>
  <body>
    <?php

    include('inc/nav.php');
    include ('model.php');
    $model = new Model();
    $id = $_REQUEST['id'];
    $addNewIngredient = $model->addNewIngredient();
    $addNewInstruction = $model->addNewInstruction();
    ?>

    <div class="container pt-5">
      <div class="py-3">
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <hr style="height: 1px; color: black; background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class='card p-2'>
          <form action="" method="post">
               <div class="form-group">
                 <label for="ings">Add Ingredient:</label>
                 <input type="text" name="ingredient" id="ings" class="form-control" value="">
                 <input type="hidden" name="id" value="<?php echo $id;  ?>">
                 <div class="text-center">
                 <button type="submit" name="updateIngredient" class="btn btn-sm btn-primary mt-2 ">Submit</button>
               </div>
               </div>
             </div>
             <div class="card p-2">
               <div class="form-group">
                 <label for="ins">Add Instruction:</label>
                 <input type="text" name="instruction" id="ins" class="form-control" value="">
                 <input type="hidden" name="ins_id" value="<?php echo $id;  ?>">
                 <div class="text-center">
                 <button type="submit" name="updateInstruction" class="btn btn-sm btn-primary mt-2">Submit</button>
               </div>
               </div>
             </div>
           </form>
         </div>
         <div class="col-sm">

          <?php

            $row = $model->fetch_single($id);
            $getIngs = $model->fetchIng();
            $getIns = $model->fetchIns();

            if(!empty($row))
            {
          ?>
          <div class="card">
            <div class="card-header  text-center">
              <h4><?php echo ucfirst($row['name']) ?>
              </h4>
            </div>
            <div class="card-body">
              <h5 class="text-center">Ingredients</h5>
              <table class="table table-sm">
                <tbody>
              <?php
              foreach($getIngs as $ings)
              {
                if($ings['id_recipe'] == $id)
                {
                echo "<tr><td>" .  $ings['ingredient'] . "</td>" ;
                ?>
                <td>
                <a href="deleteIng.php?id=<?php echo $ings['id']; ?>" class="badge badge-danger text-right">Delete</a>
              </td></tr>
                <?php
                }
              }   ?>
            </tbody>
          </table>
          <div class="text-center">
            <button class="btn btn-outline-warning btn-sm" onClick="window.location.reload();">Refresh Page After Deleting Ingredient</button>
          </div>

              <div class="row">
                <div class="col-md-12 mt-2">
                  <hr style="height: 1px; color: black; background-color: black;">
                </div>
              </div>
              <h5 class="text-center">Instructions</h5>
              <table class="table table-sm">
                <tbody>
              <?php
              foreach($getIns as $ins)
              {
                if($ins['id_ins'] == $id)
                {
                echo "<tr><td>" .  $ins['instruction'] . "</td>";
                ?>
              <td>
              <a href="deleteIns.php?id=<?php echo $ins['id']; ?>" class="badge badge-danger text-right">Delete</a>
            </td></tr>
            <?php
          }
        } ?>
      </tbody>
    </table>
    <div class="text-center">
      <button class="btn btn-outline-warning btn-sm" onClick="window.location.reload();">Refresh Page After Deleting Instruction</button>
    </div>

            </div>
          </div>
          <?php
        } else {
          echo "no data";
        }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-2">
          <hr style="height: 1px; color: black; background-color: black;">
        </div>
      </div>

          <?php
          //include 'model.php';
          //$model = new Model();
          //$id = $_REQUEST['id'];
          $row = $model->edit($id);
          //$addNewIngredient = $model->addNewIngredient();
          //$addNewInstruction = $model->addNewInstruction();

          if(isset($_POST['update']))
          {
            if (isset($_POST['name']) && isset($_POST['meal'])
                && isset($_POST['tag']) && isset($_POST['yield']) && isset($_POST['source']))
            {
              if (!empty($_POST['name']) && !empty($_POST['meal'])
                && !empty($_POST['tag']) && !empty($_POST['yield']) && !empty($_POST['source']))
              {
                $data['id'] = $id;
                $data['name'] = addslashes($_POST['name']);
                $data['meal'] = $_POST['meal'];
                $data['ingredient'] = "";
                $data['instruction'] = "";
                $data['tag'] = addslashes($_POST['tag']);
                $data['yield'] = addslashes($_POST['yield']);
                $data['source'] = addslashes($_POST['source']);

                $target = "images/" . basename($_FILES['recipeImage']['name']);
                if(isset($_FILES['recipeImage']['name']))
                {
                $data['recipeImage'] = $_FILES['recipeImage']['name'];

                $update = $model->update($data);

                if(move_uploaded_file($_FILES['recipeImage']['tmp_name'], $target))
                {
                  echo "done";
                } else {
                  echo "failed";
                }
                }

                if($update)
                {
                  echo "<script>alert('record update successful');</script>";
                  echo "<script>window.location.href = 'records.php';</script>";
                } else {
                  echo "<script>alert('record update failed');</script>";
                  echo "<script>window.location.href = 'records.php';</script>";
                }
              }else {
                echo "<script>alert('empty');</script>";
                header("Location: edit.php?id=$id");
              }
            }
          }
          ?>
          <form action="" method="post" enctype="multipart/form-data">
             <div class="form-group row">
               <label for="recipeNameEdit" class="col-sm-2 col-form-label">Recipe:</label>
               <div class="col-sm-10">
                 <input type="text" name="name" id="recipeNameEdit" class="form-control" value="<?php echo $row['name'];  ?> ">
             </div>
           </div>
             <div class="form-group row">
               <label for="meal" class="col-sm-2 col-form-label">Type:</label>
               <div class="col-sm-10">
               <select class="form-control" name="meal" id="meal">
                 <option><?php echo $row['meal'];   ?></option>
                 <option value="breakfast">Breakfast</option>
                 <option value="lunch">Lunch</option>
                 <option value="dinner">Dinner</option>
                 <option value="dessert">Dessert</option>
                 <option value="snack">Snack</option>
               </select>
                </div>
              </div>
               <div class="form-group row">
                 <label for="tagEdit" class="col-sm-2 col-form-label">Tag:</label>
                 <div class="col-sm-10">
                 <input type="text" name="tag" id="tagEdit" class="form-control" value="<?php  echo trim($row['tag']);   ?> ">
               </div>
             </div>
               <div class="form-group row">
                 <label for="servingEdit" class="col-sm-2 col-form-label">Servings:</label>
                 <div class="col-sm-10">
                 <input type="text" name="yield" id="servingEdit" class="form-control" value="<?php echo $row['yield'];   ?> ">
               </div>
             </div>
               <div class="form-group row">
                 <label for="authorEdit" class="col-sm-2 col-form-label">Author:</label>
                 <div class="col-sm-10">
                 <input type="text" name="source" id="authorEdit" class="form-control" value="<?php echo $row['source'];   ?> ">
               </div>
             </div>
               <div class="form-group row">
                 <label for="imageEdit" class="col-sm-2 col-form-label">Image:</label>
                 <div class="col-sm pt-1">
                 <input type="file" name="recipeImage" id="imageEdit" class="form-control-file" >
               </div>
             </div>
             <div class="form-group text-center">
               <button type="submit" name="update" class="btn btn-primary">Save</button>
             </div>
           </form>
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
