<?php
//calls the functions.php file
include 'inc/functions.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!--  Page refresh every 10 seconds   -->
  <meta http-equiv="Refresh" content="10">
  <meta charset="UTF-8">
  <title>Random Quotes</title>
  <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">
  <body style="background-color: <?php echo changeBackground(); ?>;">
</head>
<body>
  <header>
      <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../index.html">Back to Project Menu</a>
      </nav>
  </header>
  <div class="container">
    <div id="quote-box">
      <!-- prints the printQuote function to the screen    -->
    <?php echo printQuote($quotes); ?>
    </div>
    <button id="loadQuote" onclick="window.location.reload(true)" >Show another quote</button>
  </div>
</body>
</html>
