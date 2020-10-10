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
	</head>
  <body>
    <div class="container-fluid">
<p class="h1 text-center pt-1">Rourke Bradley Coding Projects</p>
<p>Examples of projects I have been working.</p>
<p>Source code available below at GitHub:</p>
<a href="https://github.com/Rourkebrad/RourkeBradleyCV.git" target="_blank">Github Source Code</a>

<div class="pt-5">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Title</th>
      <th scope="col">Skills</th>
      <th scope="col">Comment</th>
      <th scope="col">Open</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>ToDo App</td>
      <td>PHP - CRUD with database</td>
      <td>ToDo Web Application. </td>
      <td><a href="todoApp/index.php">ToDo App</a> </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>OOP Game</td>
      <td>PHP - Object Oriented Approach</td>
      <td>Word guessing game uing OOP.</td>
      <td><a href="oopGame/index.html">Phrase Hunter</a> </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Random Quote Generator</td>
      <td>PHP - Procedural Programming</td>
      <td>Random quotes generated with arrays.</td>
      <td><a href="randomQuote/index.php">Random Quote Generator</a> </td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Quiz App</td>
      <td>PHP - Procedural Programming</td>
      <td>Quiz web application.</td>
      <td><a href="phpQuizApp/index.php">Quiz App</a> </td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Learning Journal</td>
      <td>PHP - Procedural Programming with database</td>
      <td>Learning Journal.</td>
      <td><a href="learningJournal/index.php">Learning Journal</a> </td>
    </tr>
		<tr>
			<th scope="row">6</th>
			<td>Media Library</td>
			<td>PHP</td>
			<td>Media Library</td>
			<td><a href="mediaLibrary/index.php">Media Library</a> </td>
		</tr>
		<tr>
			<th scope="row">7</th>
			<td>Shopping List</td>
			<td>PHP - OOP</td>
			<td>Shopping List</td>
			<td><a href="">Shopping List</a> </td>
		</tr>
		<tr>
			<th scope="row">8</th>
			<td>ToDo Application</td>
			<td>PHP - CRUD - Databases - Authentication</td>
			<td>ToDo Application</td>
			<td><a href="phpUserAuthentication/index.php">ToDo Application</a> </td>
		</tr>
		<tr>
			<th scope="row">9</th>
			<td>ToDo API with Slim</td>
			<td>PHP - API - Slim</td>
			<td>ToDo API</td>
			<td><a href="toDoAPI/public/index.php">ToDo API</a> </td>
		</tr>
		<tr>
			<th scope="row">10</th>
			<td>Laravel Powered Site</td>
			<td>PHP - Laravel</td>
			<td>Laravel Powered Site</td>
			<td><a href="laravelSite/petadoption/public/index.php">Pet Adoption</a> </td>
		</tr>
		<tr>
			<th scope="row">11</th>
			<td>Unit Testing</td>
			<td>PHP - Unit Testing - OOP</td>
			<td>Unit Testing in PHP</td>
			<td><a href="unitTesting/index.php">Unit Testing</a> </td>
		</tr>
		<tr>
			<th scope="row">12</th>
			<td>BassAPP Android</td>
			<td>Javascript - HTML - PhoneGap - jQuery</td>
			<td>Application built for android</td>
			<td><a href="">BassAPP Android</a> </td>
		</tr>
		<tr>
			<th scope="row">13</th>
			<td>Responsive Website</td>
			<td>PHP - HTML - Bootstrap</td>
			<td>Web Application made responsive</td>
			<td><a href="">Responsive Website</a> </td>
		</tr>
  </tbody>
</table>
</div>
</div>


<?php
function solution($N) {
    // write your code in PHP7.0
    if($N > 0)
    {
    $bin = decbin($N);
    return $bin;
    }

}
echo solution(54);
?>
  </body>
</html>
