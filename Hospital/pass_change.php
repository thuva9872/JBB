<?php
session_start();
include_once ('C:\xampp\htdocs\BMSnew\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("hospital");
if (isset($_POST["change"])){
  $user->change_password($_REQUEST['old_password'],$_REQUEST['new_password'],$_REQUEST['confirm_password']);
}
?>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="pass change-framecss.css" type="text/css">
<style>
  body {
    background-image: url('profile change.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: cover;
  }
  </style>
<div class="login">
  <div class="login-header">
    <h2>Change Password</h2>
  </div>
  <div class="login-form">
  <form action="" method="post"> 
    <h3>OLD-Password:</h3>
    <input type="password" name="old_password" placeholder="Password"/>
    <br>
    <h3>New-Password:</h3>
    <input type="password" name="new_password" placeholder="Password"/>

    <br>
    <h3>Conform-Password:</h3>
    <input type="password" name="confirm_password" placeholder="Password"/>
    <br>
    <button type="submit" name="change"  class="change-button">Change</button>
    <br>
</form>
    
  </div>
</div>
