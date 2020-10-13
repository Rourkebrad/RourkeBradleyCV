<?php
require('classes/Game.php');
require('classes/Phrase.php');
session_start(); //starts a new session
//var_dump($_SESSION);

if (isset($_POST['start'])) {
    unset($_SESSION['selected']);
    unset($_SESSION['phrase']);
  }


if(!isset($_POST['key']))
  {
    $_SESSION['phrase'] = new Phrase(); // objects
    $_SESSION['game'] = new Game($_SESSION['phrase']);     // pass the $phrase object when instantiating the Game object
  } else
  {
    $selection = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
    $_SESSION['phrase']->selected[] = $selection;
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
  <header>
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../index.php">Back to Project Menu</a>
      </nav>
  </header>
<div class="main-container">

        <h2 class="header">Phrase Hunter</h2>
        <div id="colourChange">
        <?php
        echo $_SESSION['phrase']->addPhraseToDisplay();
        ?>
      </div>
        <form action="play.php" method="POST">
          <div id="keyboardBack">
        <?php
        echo $_SESSION['game']->displayKeyboard();
        ?>
      </div>
        <?php
        echo $_SESSION['game']->displayScore();
        echo $_SESSION['game']->gameOver();

        ?>

        </form>


</div>
<!-- Script for using keyboard for choosing answer   -->
        <script>
        document.addEventListener('keydown', function(event) {
          var keyboard = document.getElementsByClassName('key');
          var key_press = event.key;
          for(let i= 0; i <= keyboard.length -1; i++) {
              let key = keyboard[i].value;
              if(key_press == key) {
                keyboard[i].click();
              }
          }
        });
        </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
