<?php

//class named Game with two properties
class Game
{
    //properties
    // need to decide public, protected, private
    private $phrase;  //a Phrase objectm which will be set by the constructor
    private $lives = 5;   //used to set how many wrong guesses a player has before Game Over. This should be set to 5.

    //constructor
    //class should include a constructor which accepts a Phrase object and sets the property. Should receive one REQUIRED parameters, a Phrase object. Use this object to set the $phrase property
    public function __construct($phraseObj)
    {
      $this->phrase = $phraseObj;

    }

    //this method checks to see if the player has selected all of the letters
    function checkForWin()
    {
      if (count(array_intersect($this->phrase->selected, $this->phrase->getLetterArray())) == count($this->phrase->getLetterArray()))
      {
        return true;

      } else {
        return false;
      }

    }

    //this method checks to see if the player has guessed too many wrong letters
    function checkForLose()
    {
      if ($this->phrase->numberLost() == $this->lives)
      {
        return true;
      }  else
          {
            return false;
          }
    }




    //this method displays one message if the player wins and another message if they lose. It returns false if the game has not been won or lost.
    function gameOver()
    {
      if($this->checkForLose() == true)
      {
        return "<div id=\"overlay\" class=\"lose\"><h1 id=\"game-over-message\">The phrase was: \"" . $this->phrase->currentPhrase ."\" Better luck next time!</h1>
        <form action=\"play.php\" method=\"post\">
            <input id=\"btn__reset\" type=\"submit\" value=\"Start Game\" />
        </form></div>";
      } elseif ($this->checkForWin() == true)
      {

        return "<div id=\"overlay\" class=\"win\"><h1 id=\"game-over-message\">Congratulations on guessing: \"" . $this->phrase->currentPhrase ."\"</h1>
        <form action=\"play.php\" method=\"post\">
            <input id=\"btn__reset\" type=\"submit\" value=\"Start Game\" />
        </form></div>";

      } else {
        return false;
      }


    }

    //sisplay the number of guesses available. See example example_html/scoreboard.txt file for an example of what the render HTML for a scoreboard should look like. Return string HTML of Scoreboard.
    function displayScore()
    {

      $keys = "<div id=\"scoreboard\" class=\"section\">";
      $keys .= "<ol>";


      for ($i =1; $i <= $this->phrase->numberLost(); $i++)
      {
      $keys .= "<li class=\"tries\"><img src=\"images/lostHeart.png\" height=\"35px\" widght=\"30px\"></li>";
      }
      for ($i =1; $i <= ($this->lives - $this->phrase->numberLost()); $i++)
      {
        $keys .= "<li class=\"tries\"><img src=\"images/liveHeart.png\" height=\"35px\" widght=\"30px\"></li>";

      }

      $keys .= "</ol>";
      $keys .= "</div>";

      return $keys;

    }

    /*
    Head back to Game.php. Now we want to show our keyboard. Create a `displayKeyboard`
    function that builds the HTML of a form with each letter being a submit button. You can find a
    sample of the button HTML in example_html/keyboard.txt. Start by pasting this sample code into
    your `displayKeyboard` method. Make sure you surround this code with a form that POSTS to the
    play.php page. Return the HTML.
    */

    public function displayKeyboard()
    {

      //$keys = "<form action='play.php' method='POST'>";
      $keys = "<div id=\"qwerty\" class=\"section\">";

      $keys .= "<div class=\"keyrow\">";
      $keys .= $this->keyIn('q');
      $keys .= $this->keyIn('w');
      $keys .= $this->keyIn('e');
      $keys .= $this->keyIn('r');
      $keys .= $this->keyIn('t');
      $keys .= $this->keyIn('y');
      $keys .= $this->keyIn('u');
      $keys .= $this->keyIn('i');
      $keys .= $this->keyIn('o');
      $keys .= $this->keyIn('p');
      $keys .= "</div>";

      $keys .= "<div class=\"keyrow\">";
      $keys .= $this->keyIn('a');
      $keys .= $this->keyIn('s');
      $keys .= $this->keyIn('d');
      $keys .= $this->keyIn('f');
      $keys .= $this->keyIn('g');
      $keys .= $this->keyIn('h');
      $keys .= $this->keyIn('j');
      $keys .= $this->keyIn('k');
      $keys .= $this->keyIn('l');
      $keys .= "</div>";

      $keys .= "<div class=\"keyrow\">";
      $keys .= $this->keyIn('z');
      $keys .= $this->keyIn('x');
      $keys .= $this->keyIn('c');
      $keys .= $this->keyIn('v');
      $keys .= $this->keyIn('b');
      $keys .= $this->keyIn('n');
      $keys .= $this->keyIn('m');
      $keys .= "</div>";

      $keys .= "</div>";


      return $keys;

    }

    public function keyIn($letter)
    {
      if(!in_array($letter, $this->phrase->selected))
      {
        return "<input id=\"" . $letter . "\" type=\"submit\" button name=\"key\"value=\"" . $letter . "\" class=\"key\" ></button>";
      } else {
        if($this->phrase->checkLetter($letter))
        {
          return "<input id=\"" . $letter . "\" type=\"submit\" button name=\"key\"value=\"" . $letter . "\" class=\"key correct\" disabled ></button>";
        } else {
          return "<input id=\"" . $letter . "\" type=\"submit\" button name=\"key\"value=\"" . $letter . "\" class=\"key incorrect\" disabled ></button>";
        }
      }
    }


}







?>
