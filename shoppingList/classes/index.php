<?php
//include 'classes/recipe.php';
//include 'inc/recipe.php';
//include 'classes/recipecollection.php';
//include 'classes/render.php';
require('classes/user_validator.php');

if(isset($_POST['submit']))
{
  //validate entries
  $validation = new UserValidator($_POST);
  $errors = $validation->validateForm();

  //save data to db

}

/*
//instance of a class (object)
echo $eggMangoFlatbread->getTitle();
echo "<br>";
foreach ($eggMangoFlatbread->getIngredients() as $ing)
{
  echo "\n" . $ing['amount'] . " " . $ing['measure'] . " " . $ing['item'];
  echo "<br>";
}
echo "<br>";

echo implode("<br>", $eggMangoFlatbread->getInstructions());
echo "<br>";
echo "<br>";
echo implode("<br>" , $eggMangoFlatbread->getTags());
echo "<br>";
echo "<br>";
echo $eggMangoFlatbread->getYield();
echo "<br>";
echo "<br>";
echo $eggMangoFlatbread->getSource();
//accessing properties

$shopping = new RecipeCollection("Rourke's shopping");
$shopping->addRecipe($eggMangoFlatbread);


$breakfast = new RecipeCollection("Favourite Breakfasts");
foreach ($cookbook->filterByTags("breakfast") as $recipe)
{
  $breakfast->addRecipe($recipe);
}

$week1 = new RecipeCollection("Meal Plan: Week 1");
$week1->addRecipe($cookbook->filterById(2));
$week1->addRecipe($cookbook->filterById(3));
$week1->addRecipe($cookbook->filterById(6));
$week1->addRecipe($cookbook->filterById(16));
echo $cookbook->getTitle();
echo "\n";
echo Render::listRecipes($week1->getRecipeTitles());
echo "\n\nSHOPPING LIST\n\n";
echo Render::listShopping($week1->getCombinedIngredients());
*/
?>
<br>
<div>
Add a receipe
</div>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <label for "recipeName">Recipe:</label><br>
  <input type="text" id="recipeName" name="recipeName" placeholder="Recipe"><br>
  <label for "recipeName">Add Ingredient:</label><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <input type="text" id="addIngredient" name="addIngredient[]"  placeholder="Add a Ingredient"><br>
  <label for "recipeName">Add Instruction:</label><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <input type="text" id="addInstruction" name="addInstruction[]" placeholder="Add a Instruction"><br>
  <label for "recipeName">Add a Tag:</label><br>
  <input type="text" id="addTag" name="addTag" placeholder="Tag"><br>
  <label for "recipeName">Add a Yield:</label><br>
  <input type="text" id="addYield" name="addYield" placeholder="Yield"><br>
  <label for "recipeName">Add a Source:</label><br>
  <input type="text" id="addSource" name="addSource" placeholder="Source"><br>
<input type="submit" value="submit" name="submit">

</form>
