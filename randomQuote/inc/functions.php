<?php
//PHP code for random quote generator

//Multidimensional array called quotes
//Inner arrays are all associative arrays
$quotes[] = [
'quote' => "Some people think football is a matter of life and death. I don't like that attitude. I can assure them it is much more serious than that.",
'source' => 'Bill Shankly',
'citation' => 'Sunday Times(UK)',
'year' => 1981,
'tags' => 'Newspaper'
];

$quotes[] = [
'quote' => "Football is a simple game; 22 men chase a ball for 90 minutes and at the end, the Germans win.",
'source' => 'Gary Lineker',
'year' => 1990,
'tags' => 'humour'
];

$quotes[] = [
'quote' => "The first 90 minutes are the most important.",
'source' => 'Sir Bobby Robson',
'tags' => 'humour'

];

$quotes[] = [
'quote' => "The Germans only have one player under 22, and he's 23.",
'source' => 'Kevin Keegan',

];

$quotes[] = [
'quote' => "Winning doesn't really matter as long as you win.",
'source' => 'Vinnie Jones',

];

// Create the getRandomQuuote function and name it getRandomQuote
//This function generates a random number from 0-4 using the rand function

function getRandomQuote ($array)
{
    $number = rand(0,4);
    return $array[$number];
}

//function to change the background colour randomly

function changeBackground()
{
  $background = ['green', 'orange','blue', 'pink', 'grey'];
  $number = rand(0,4);
  return $background[$number];

}

// Create the printQuote funtion and name it printQuote
//This function takes the getRandomQuote function and adds HTML to it for printing to the screen.
//isset is used for determining whether 'citation', 'year' and 'tags' are included in the quote.

function printQuote($array)
{
  $quoteArray = getRandomQuote($array);
  $quotePrint = '<p class="quote">' . $quoteArray["quote"] .  '</p>';
  $quotePrint .= '<p class="source">' . $quoteArray["source"];
  if (isset($quoteArray['citation']))
  {
      $quotePrint .= '<span class="citation">' .  $quoteArray["citation"] . '</span>';
  }
  if (isset($quoteArray['year']))
  {
      $quotePrint .= '<span class="year">' . $quoteArray["year"] .  '</span>';
  }
  if (isset($quoteArray['tags']))
  {
      $quotePrint .= ", (category: " . '<span class="tags">' . $quoteArray["tags"] .  '</span>' . ")";
  }
  $quotePrint .= "</p>";

return $quotePrint;
changeBackground();
}

?>
