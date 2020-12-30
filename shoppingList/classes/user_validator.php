<?php

class UserValidator {

  private $data;
  private $errors = [];
  private static $fields = ['recipeName', 'addIngredient', 'addInstruction', 'addTag', 'addYield', 'addSource'];

  //constructor
  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  public function validateForm()
  {
    foreach(self::$fields as $field)
    {
      if(!array_key_exists($field, $this->data))
      {
        trigger_error("$field is not present in data");
        return;
      }
    }
    $this->validateRecipeName();
    return $this->errors;
  }

  private function validateRecipeName(){
    $val = trim($this->data['recipeName']);

    if(empty($val))
    {
      $this->addError('recipeName', 'cannot be empty');
    } else{
      if(!preg_match('/^[A-zA-Z0-9]{6,12}$/', $val))  //look into learning more about this
      {
        $this->addError('recipeName', 'recipeName must be 6-12 chars and alphanumeric');
      }
    }
  }
  
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }

}

?>
