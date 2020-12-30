<?php
if(session_start())
{
	session_destroy();
}
 ?>

<!doctype html>
<html lang="en">
	<head>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Rourke Bradley Homepage</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
	
body {
    width: 100%;
    height: 100%;
    background-image: url('img/bkimage.jpg');
}


</style>
	</head>

  <body>
    <div class="container-fluid">
<p class="display-3 text-center pt-1">Rourke Bradley Coding Projects</p>
<p class="lead">Examples of projects I have been working on using HTML, PHP, mySQL, JavaScript and Bootstrap. Source code available below at GitHub:</p>
<a href="https://github.com/Rourkebrad/RourkeBradleyCV.git" target="_blank">Github Source Code</a>

<div class="pt-5">

<table class="table table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Title</th>
      <th scope="col">Skills</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
      	<tr >
			<th scope="row">1</th>
			<td>Shopping List</td>
			<td>PHP / HTML / Bootstrap / mySQL</td>
			<td><a href="shoppingList/index.php">Shopping List</a> </td>
		</tr>
    <tr>
      <th scope="row">2</th>
      <td>ToDo App</td>
      <td>PHP / HTML / Bootstrap / mySQL</td>
      <td><a href="todoApp/index.php">ToDo App</a> </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>OOP Game</td>
      <td>PHP</td>
      <td><a href="oopGame/index.html">Phrase Hunter</a> </td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Random Quote Generator</td>
      <td>PHP</td>
      <td><a href="randomQuote/index.php">Random Quote Generator</a> </td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Quiz App</td>
      <td>PHP</td>
      <td><a href="phpQuizApp/index.php">Quiz App</a></td>
    </tr>
    <!--<tr>
      <th scope="row">6</th>
      <td>Learning Journal</td>
      <td>PHP - Procedural Programming with database</td>
      <td><a href="learningJournal/index.php">Learning Journal</a> </td>
    </tr>
		<tr>
			<th scope="row">7</th>
			<td>Media Library (working progress)</td>
			<td>PHP</td>
			<td><a href="mediaLibrary/index.php">Media Library</a> </td>
		</tr>
	
			
		<tr>
			<th scope="row">8</th>
			<td>ToDo Application</td>
			<td>PHP - CRUD - Databases - Authentication</td>
			<td><a href="phpUserAuthentication/index.php">ToDo Application</a> </td>
		</tr>
	
		<tr>
			<th scope="row">9</th>
			<td class="nav-link disabled">ToDo API with Slim (project coming soon)</td>
			<td>PHP - API - Slim</td>
			<td class="nav-link disabled"><a href="toDoAPI/public/index.php">ToDo API</a> </td>
		</tr>
		<tr>
			<th scope="row">10</th>
			<td class="nav-link disabled">Laravel Powered Site (project coming soon)</td>
			<td>PHP - Laravel</td>
			<td class="nav-link disabled"><a href="laravelSite/petadoption/public/index.php">Pet Adoption</a></td>
		</tr>
		<tr>
			<th scope="row">11</th>
			<td class="nav-link disabled">Unit Testing (project coming soon)</td>
			<td>PHP - Unit Testing - OOP</td>
			<td class="nav-link disabled"><a href="unitTesting/index.php">Unit Testing</a> </td>
		</tr>
		<tr>
			<th scope="row">12</th>
			<td class="nav-link disabled">BassAPP Android (project coming soon)</td>
			<td>Javascript - HTML - PhoneGap - jQuery</td>
			<td class="nav-link disabled"><a href="">BassAPP Android</a> </td>
		</tr>
		<tr>
			<th scope="row">13</th>
			<td class="nav-link disabled">Responsive Website (project coming soon)</td>
			<td>PHP - HTML - Bootstrap</td>
			<td class="nav-link disabled"><a href="">Responsive Website</a> </td>
		</tr> -->
  </tbody>
</table>
</div>

<footer>
	<div class="footer text-center fixed-bottom">
		© Rourke Bradley
	</div>
</footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  </body>
</html>
