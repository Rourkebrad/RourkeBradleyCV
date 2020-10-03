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
      <body style="background-color: lightblue">



</head>
<body>
  <header>
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../index.html">Back to Project Menu</a>
      </nav>
  </header>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs"><?php echo "Question " . $_SESSION['clicks'];?> of <?php echo $totalQuestions;?></p>
            <p class="quiz">What is <?php echo $leftAdder;?> + <?php echo $rightAdder;?>?</p>

            <p class="breadcrumbs">Select answer below:</p>
            <form action="<?php formPage(); ?>" method="post">

                <input type="hidden" name="correctAnswer" value="<?php echo $correct;?>" />
                <input type="submit" class="btn" name="answer"  value="<?php echo $shuffleAnswer[0];?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $shuffleAnswer[1];?>" />
                <input type="submit" class="btn" name="answer"  value="<?php echo $shuffleAnswer[2];?>" />

            </form>
        </div>
    </div>

</body>
</html>
