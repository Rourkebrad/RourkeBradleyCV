<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>View Shopping List</title>
  </head>
  <body>
    <?php
    include('inc/nav.php');
    include ('model.php');
    $model = new Model();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    $result= "";


if(isset($_POST['submitEmail']))
{
  try {

    $mail = new PHPMailer(true);      //new object created
    //$mail->SMTPDebug = 3;
    $mail->Host = "lh28.dnsireland.com";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail ->SMTPSecure = "tls";
    $mail->Username = "rourke@rourkebradley.com";
    $mail->Password = "L1verp00l97";
      $mail->setFrom('rourke@rourkebradley.com');
      $mail->addAddress($_POST['nameEmail']);
      $mail->isHTML(true);
      $mail->Subject = "Shopping List " . date("d/m/Y");
      $rows = $model->fetchAllIngsMatched();
      foreach($rows as $row)
              {
                 $mail->Body .= $row['ingredient'] . " ";
                 $mail->Body .= $row['name'] . "<br>";
              }

      if ($mail->send())
      {
        $result = "Message sent";
      }

    }

    catch (Exception $e)
    {
      echo "Error: Message did not send <br>";
      echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
      echo $e->getMessage();
    }
  }



    ?>
    <div class="container pt-5">
      <div class="py-3">
      </div>

      <form action="" method="post">
        <div class="form-group row">
          <label for="emailEntered" class="col-sm-2 col-form-label">Email address:</label>
          <div class="col-sm-10">
          <input type="text" id="emailEntered" name="nameEmail" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <button type="submit" name="submitEmail" class="btn btn-primary">Send to email address</button>
      </div>
      </form>
      <?php
      echo $result;

      ?>

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
