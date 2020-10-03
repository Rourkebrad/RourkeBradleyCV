<?php
include('inc/generate_questions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
      <body style="background-color: #FFD700">
</head>
<body>
  <header>
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../index.html">Back to Project Menu</a>
      </nav>
  </header>
    <div class="container">
        <div id="quiz-box">
            <h1 class="breadcrumbs"><?php echo "You scored " . $_SESSION['totalCorrect'] . " out of " . $totalQuestions;   ?></h1>
            <form action="index.php" method="post">
                <input type="submit" class="btn" name="reset" value="Take the quiz again" />
            </form>
        </div>
    </div>
</body>
</html>
