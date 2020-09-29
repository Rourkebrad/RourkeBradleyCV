<?php

//handling exceptions - use try/catch
try
{
 //creates a new object of class PDO
 $db = new PDO("sqlite:" . __DIR__ . "/database.db");
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e)
{
  echo $e->getMessage();
  exit;  //stops anymore code from executing
}
