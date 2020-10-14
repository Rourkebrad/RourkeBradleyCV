<?php
require_once __DIR__ . '/../inc/bootstrap.php';
requireAuth();

$currentPassword = request()->get('current_password');
$newPassword = request()->get('password');
$confirmPassword = request()->get('confirm_password');

if ($newPassword != $confirmPassword)
{
  $session->getFlashBag()->add('error', 'New Passwords do not match!!');
  redirect('/phpUserAuthentication/account.php');
}

$user = getAuthenticatedUser();

if(empty($user))
{
  $session->getFlashBag()->add('error', 'Error happened, please try again!');
  redirect('/phpUserAuthentication/account.php');
}

if(!password_verify($currentPassword, $user['password']))
{
  $session->getFlashBag()->add('error', 'Current password is incorrect, please try again!');
  redirect('/phpUserAuthentication/account.php');
}

$hashed = password_hash($newPassword, PASSWORD_DEFAULT);

if (!updatePassword($hashed, $user['id']))
{
  $session->getFlashBag()->add('error', 'Could not update password');
  redirect('/phpUserAuthentication/account.php');

}

$session->getFlashBag()->add('success', 'Password has been successfully changed');
redirect('/phpUserAuthentication/account.php');

?>
