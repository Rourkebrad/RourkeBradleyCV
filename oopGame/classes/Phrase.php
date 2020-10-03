<?php

//class called Phrase
//need to decide on if public, protected, private
class Phrase
{
    //properties
    public $currentPhrase;   //A string containing the current phrase to be used in the game.
    public $selected = [];   //An array of letters the user has guessed. initialisep the property to an empty array.
    public $phrase = [
    "right up your alley",
    "Play Cat and Mouse",
    "I can and I will",
    "The adventure begins",
    "Dream without fear",
    "Love without limits",
    "Prove them wrong",
    "He who is brave is free",
    "Fight till the last gasp",
    "You can do anything you set your mind to"
      ];

  /*constructor that accepts two parameters optional. $phrase a string, or if empty, get a random phrase.
  $selected an array of selected letters.
  */
  public function __construct($phrase=null, $selected=null)
  {
    if(!empty($phrase))
    {
    $this->currentPhrase = $phrase;
    } elseif (!isset($phrase))  {
        $randomPhrase = array_rand($this->phrase);
        $this->currentPhrase = $this->phrase[$randomPhrase];
      }

    if(!empty($selected))
    {
    $this->selected = $selected;
  }

  }

  //method
  /*This method adds letter placeholders to teh display when the game starts.
  Each letter is presented by an empty box, one list item for each character.
  See example_phrase_html.txt file for example
  */
  public function addPhraseToDisplay()
  {
    $renderOutput = "<div id='phrase' class='section'><ul>";   //first line of output
    $phraseLetter = str_split(strtolower($this->currentPhrase));    //splits the string into lowercase characters

    foreach($phraseLetter as $letter)
    {
      if($letter == " ")
      {
        $renderOutput .= "<li class=\"space\">" . $letter . "</li>";
      }  elseif (!in_array($letter, $this->selected)) {
        $renderOutput .= "<li class=\"hide letter\">" . $letter . "</li>";
      } elseif (in_array($letter, $this->selected))
      {
        $renderOutput .= "<li class=\"show letter\">" . $letter . "</li>";
      }

      }
      $renderOutput .= "</ul></div>";
      return $renderOutput;
    }

    public function getLetterArray()
    {
      return array_unique(str_split(str_replace(
                 ' ',
                 '',
                 strtolower($this->currentPhrase)
        )));
    }

    public function checkLetter($letter)
    {
    if (in_array($letter, $this->getLetterArray())) {
        return true;
      } else {return false;}

    }

    public function numberLost()
    {
      return count(array_diff($this->selected, $this->getLetterArray()));

    }


  }









?>
