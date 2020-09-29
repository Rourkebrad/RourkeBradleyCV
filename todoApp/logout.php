<?php
//session ends
include_once 'inc/session.php';
session_destroy();
header('location: index.php');
