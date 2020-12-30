<?php
class Model
{
  private $server = "localhost";
  private $username = "rourkebr_admin";
  private $password = "Tar1123steach";
  private $db = "rourkebr_shoppingList";
  private $conn;

  public function __construct()
  {
    try
    {
      $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
    } catch (Exception $e)
    {
      echo "connection failed" , $e->getMessage();
    }
  }

 public function add()
  {
    if (isset($_POST['submit']))
    {
      if (isset($_POST['name']) && isset($_POST['meal']))
      {
        if (!empty($_POST['name']) && !empty($_POST['meal']))
        {
          //$name = $sql = $this->conn-> real_escape_string( $_POST['name']);
          $name = addslashes($_POST['name']);
          $meal = $_POST['meal'];
          $ingredient = "";
          $instruction = "";
          $tag = "";
          $yield = "";
          $source ="";
          $recipeImage = "";

          $query = "INSERT INTO recipes (name, meal, ingredient, instruction, tag, yield, source, recipeImage) VALUES ('$name', '$meal', '$ingredient', '$instruction', '$tag', '$yield', '$source', '$recipeImage')";
          //var_dump($sql = $this->conn->query($query));

          if ($sql = $this->conn->query($query))
          {

            echo "<script>alert('Added Successfully!');</script>";
            echo "<script>window.location.href='records.php';</script>";
          } else {
            echo "<script>alert('Failed to Add');</script>";
            echo "<script>window.location.href='index.php';</script>";
          }
        } else {
          echo "<script>alert('Form empty');</script>";
          echo "<script>window.location.href='index.php';</script>";
      }

    }
    }
  }


  public function addNewIngredient()
   {
     if (isset($_POST['updateIngredient']))
     {

       if (isset($_POST['ingredient']))
       {
         if (!empty($_POST['ingredient']))
         {
           $id  =$_POST['id'];
           $ingredient = $_POST['ingredient'];

           $query = "INSERT INTO ingredients (id_recipe, ingredient) VALUES ('$id', '$ingredient')";
           //var_dump($sql = $this->conn->query($query));

           if ($sql = $this->conn->query($query))
           {

             echo "<script>window.location.href='edit.php?id=$id';</script>";
           } else {

             echo "<script>window.location.href='index.php';</script>";
           }
         } else {

           echo "<script>window.location.href='index.php';</script>";
       }

     }
     }
   }

   public function addNewInstruction()
    {
      if (isset($_POST['updateInstruction']))
      {

        if (isset($_POST['instruction']))
        {
          if (!empty($_POST['instruction']))
          {
            $id = $_POST['ins_id'];
            $instruction = $_POST['instruction'];

            $query = "INSERT INTO instructions (id_ins, instruction) VALUES ('$id', '$instruction')";
            //var_dump($sql = $this->conn->query($query));

            if ($sql = $this->conn->query($query))
            {
              echo "<script>window.location.href='edit.php?id=$id';</script>";
            } else {

              echo "<script>window.location.href='index.php';</script>";
            }
          } else {

            echo "<script>window.location.href='index.php';</script>";
        }
      }
      }
    }

    public function addToShopping()
     {
       if (isset($_POST['addToShopping']))
       {
         if (isset($_POST['shop']))
         {
           if (!empty($_POST['shop']))
           {
             $id = $_POST['shop'];

             $query = "INSERT INTO list (shop) VALUES ('$id')";
             //var_dump($sql = $this->conn->query($query));
             if ($sql = $this->conn->query($query))
             {
               echo "<script>alert('success');</script>";
               echo "<script>window.location.href='list.php';</script>";
             } else {
               echo "<script>window.location.href='index.php';</script>";
             }
           } else {
             echo "<script>window.location.href='index.php';</script>";
         }
     }
   }
 }



  public function fetch()
  {
    $data = null;
    $query = "SELECT * FROM recipes ORDER BY added DESC";
    if($sql = $this->conn->query($query))
    {
      while($row = mysqli_fetch_assoc($sql))
      {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function fetchAllIngs()
  {
    $data = null;
    $query = "SELECT * FROM ingredients";
    if($sql = $this->conn->query($query))
    {
      while($row = mysqli_fetch_assoc($sql))
      {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function fetchAllIngsMatched()
  {
    $data = null;
    $query = "SELECT ingredients.ingredient, recipes.name FROM ingredients INNER JOIN list ON ingredients.id_recipe = list.shop INNER JOIN recipes ON ingredients.id_recipe = recipes.id ORDER BY ingredient ASC ";
    if($sql = $this->conn->query($query))
    {
      while($row = mysqli_fetch_assoc($sql))
      {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function delete($id)
  {
    $query = "DELETE FROM recipes where id = '$id'";
    if ($sql = $this->conn->query($query))
    {
      return true;
    } else {
      return false;
    }
  }

  public function deleteShoppingList()
  {
    $query = "TRUNCATE TABLE list";
    if ($sql = $this->conn->query($query))
    {
      return true;
    } else {
      return false;
    }
  }


  public function deleteIns($id)
  {
    $query = "DELETE FROM ingredients where id = '$id'";
    if ($sql = $this->conn->query($query))
    {
      return true;
    } else {
      return false;
    }
  }

  public function deleteInstruct($id)
  {
    $query = "DELETE FROM instructions where id = '$id'";
    if ($sql = $this->conn->query($query))
    {
      return true;
    } else {
      return false;
    }
  }



  public function fetch_single($id)
  {
    $data = null;
    $query = "SELECT * FROM recipes WHERE id = '$id'";
    if ($sql = $this->conn->query($query))
    {
      while ($row = $sql->fetch_assoc())
      {
        $data = $row;
      }
    }
    return $data;
  }



  public function fetchIng()
  {
    $data = null;
    $query = "SELECT * FROM ingredients";
    if($sql = $this->conn->query($query))
    {
      while($row = mysqli_fetch_assoc($sql))
      {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function fetchIns()
  {
    $data = null;
    $query = "SELECT * FROM instructions";
    if($sql = $this->conn->query($query))
    {
      while($row = mysqli_fetch_assoc($sql))
      {
        $data[] = $row;
      }
    }
    return $data;
  }


  public function edit($id)
  {
    $data = null;
    $query = "SELECT * FROM recipes WHERE id = '$id'";
    if($sql = $this->conn->query($query))
    {
      while($row = $sql->fetch_assoc())
      {
        $data = $row;
      }
    }
    return $data;
  }


  public function update($data)
  {
    $query = "UPDATE recipes SET name='$data[name]', meal='$data[meal]', ingredient='$data[ingredient]', instruction='$data[instruction]',
    tag='$data[tag]', yield='$data[yield]', source='$data[source]', recipeImage= '$data[recipeImage]' WHERE id='$data[id]'";

    if($sql = $this->conn->query($query))
    {
      return true;
    } else {
      return false;
    }
  }


}
?>
