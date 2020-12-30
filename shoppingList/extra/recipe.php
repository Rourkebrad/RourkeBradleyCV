<?php

$eggMangoFlatbread = new Recipe("Egg & mango chutney flatbreads");
$eggMangoFlatbread->addIngredient("eggs", 4);
$eggMangoFlatbread->addIngredient("self-raising flour", 100, "grams");
$eggMangoFlatbread->addIngredient("natural yoghurt", 6, "tbsp");
$eggMangoFlatbread->addIngredient("mango chutney", 2, "tbsp");
$eggMangoFlatbread->addIngredient("red chilli", 1);

$eggMangoFlatbread->addInstruction("Lower the eggs into a pan of vigorously simmering water and boil for 5½ minutes exactly, then refresh under cold water until cool enough to handle, and peel.");
$eggMangoFlatbread->addInstruction("Meanwhile, put a large non-stick frying pan on a medium-high heat.");
$eggMangoFlatbread->addInstruction("In a bowl, mix the flour with a little pinch of sea salt, 4 tablespoons of yoghurt and 1 tablespoon of olive oil until you have a dough. Halve, then roll out each piece on a flour-dusted surface until just under ½cm thick.");
$eggMangoFlatbread->addInstruction("Cook for 3 minutes, or until golden, turning halfway.");
$eggMangoFlatbread->addInstruction("Dot the mango chutney and remaining yoghurt over the breads.");
$eggMangoFlatbread->addInstruction("Halve the soft-boiled eggs and arrange on top, smashing them in with a fork, if you like.");
$eggMangoFlatbread->addInstruction("Finely slice the chilli and scatter over (as much as you dare!), drizzle with a little extra virgin olive oil and season with salt and black pepper from a height.");

$eggMangoFlatbread->addTag("breakfast, lunch");

$eggMangoFlatbread->setYield("2 servings");

$eggMangoFlatbread->setSource("Jamie Oliver");
