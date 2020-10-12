<?php

include('inc/generate_questions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body style="background-color: lightblue">
  <header>
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../index.php">Back to Project Menu</a>
      </nav>
  </header>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs"><?php if(isset($_SESSION['clicks'])){ echo "Question " . $_SESSION['clicks'];} else { echo "Question " . $_SESSION['clicks'] = 1; $_SESSION['totalCorrect'] = 0;}?> of <?php echo $totalQuestions;?></p>
            <p class="quiz">What is <?php echo $leftAdder;?> + <?php echo $rightAdder;?>?</p>
            <br>
            <p class="breadcrumbs">Select answer below:</p>
            <form action="<?php formPage(); ?>" method="post">

                <input type="hidden" name="correctAnswer" value="<?php echo $correct;?>" />
                <input type="submit" class="btn btn-outline-success" name="answer"  value="<?php echo $shuffleAnswer[0];?>" />
                <input type="submit" class="btn btn-outline-success" name="answer" value="<?php echo $shuffleAnswer[1];?>" />
                <input type="submit" class="btn btn-outline-success" name="answer"  value="<?php echo $shuffleAnswer[2];?>" />

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
