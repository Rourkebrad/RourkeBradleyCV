<?php

if((isset($_SESSION['id']) || isset($_GET['user_identity'])) && !isset($_POST['updateProfileBtn']))
{

  if(isset($_GET['user_identity']))
  {
    $url_encoded_id = $_GET['user_identity'];
    $decode_id = base64_decode($url_encoded_id);
    $user_id_array = explode("encodeuserid", $decode_id);
    $id = $user_id_array[1];
  } else{
  $id = $_SESSION['id'];
}
  //function for accessing db for profile page
    include 'inc/connection.php';
    $sql = "SELECT * FROM users WHERE id = ?";
    $results = $db->prepare($sql);
    $results->bindValue(1, $id, PDO::PARAM_INT);
    $results->execute();

    while ($rs = $results->fetch())
    {
      $userlogin = $rs['userlogin'];
      $department = $rs['department'];
      $password = $rs['password'];
      $date_joined = strftime("%b, %d, %Y", strtotime($rs["join_date"]));
    }
    $encode_id = base64_encode("encodeuserid{$id}");

}
