<html>
<head>
	<title> <?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

	<div class="header">

        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
          <a class="navbar-brand" href="../index.html">Back to Project Menu</a>
        </nav>


		<div class="wrapper">

			<h1 class="branding-title"><a href="./">Personal Media Library</a></h1>

			<ul class="nav">
                <li class="books<?php if($section == "books"){echo " on";} ?>"><a href="catalog.php?cat=books">Books</a></li>
                <li class="movies<?php if($section == "movies"){echo " on";} ?>"><a href="catalog.php?cat=movies">Movies</a></li>
                <li class="music<?php if($section == "music"){echo " on";} ?>"><a href="catalog.php?cat=music">Music</a></li>
                <li class="suggest<?php if($section == "suggest"){echo " on";} ?>"><a href="suggest.php">Suggest</a></li>
            </ul>

		</div>

	</div>
