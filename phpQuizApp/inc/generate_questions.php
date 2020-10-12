<?php
// Generate random questions
$leftAdder = rand(0,20); //question on the left
$rightAdder = rand(0,20); //question on the right
$correct = $leftAdder + $rightAdder; // Get random numbers to add
$firstIncorrectRange = rand(1,10); // Get incorrect answers within 10 numbers either way of correct answer
$secondIncorrectRange = rand(1,10); // Get incorrect answers within 10 numbers either way of correct answer
$firstIncorrect = $correct + $firstIncorrectRange; // Get incorrect answers within 10 numbers either way of correct answer
$secondIncorrect = $correct - $secondIncorrectRange; // Get incorrect answers within 10 numbers either way of correct answer


$totalQuestions = 10; //total number of questions

//Shuffle answers
$shuffleAnswer = array($correct, $firstIncorrect, $secondIncorrect);
shuffle($shuffleAnswer);

// start of session
session_start();

//resetting the questions bacl to the start
if(isset($_POST['reset']))
{
  $_SESSION['clicks'] = 1;
  $_SESSION['totalCorrect'] = 0;
}

 if(isset($_POST['answer']))
 {
   $_SESSION['clicks']++;
 }

 // Calculate correct answer
  if(isset($_POST['answer']))
 {
 $AnswerSelected = $_POST['answer'];
 $correctAns = $_POST['correctAnswer'];

 if($AnswerSelected == $correctAns)
 {

   $correctStatement = "Correct Answer";
   $_SESSION['totalCorrect']++;

 }
 else {
   $correctStatement = "Incorrect Answer";

 }

 }


// Make sure it is a unique answer
if($firstIncorrect == $secondIncorrect)
  {
    $firstIncorrect = $firstIncorrect - 1;
  }
  elseif ($secondIncorrect == $correct)
  {
    $secondIncorrect = $secondIncorrect - 1;
  }

// function for adding which page to go to after button is submitted.
function formPage()
{
  if($_SESSION['clicks'] == 10)
{
  echo "finish.php";
}
else
 {
   echo "correct.php";
 }

}

//changing background for answers
function changeBackground()
{
  $backgroundCorrect = 'green';
  $backgroundIncorrect = 'red';
if($_POST['answer'] == $_POST['correctAnswer'])
{
  return $backgroundCorrect;

}
else
 {
  return $backgroundIncorrect;
}
}

?>
