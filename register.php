<?php

    include("header.php");
    include("navbar.php");
    ?>


   

<div class="container mt-3">

    <div class="card">
    <div class="card-header">Register</div>
    <div class="card-body">
    <form action="/action_page.php">

    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
      <label for="username">Username</label>
    </div>

    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
      <label for="email">Email</label>
    </div>

    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="confirm email" placeholder="Confirm email" name="confirm email">
      <label for="confirm email">Confirm Email</label>
    </div>

    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
      <label for="pwd">Password</label>
    </div>

    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="confirm pwd" placeholder="Confirm password" name="confirm pswd">
      <label for="confirm pwd">Confirm Password</label>
    </div>

    <button type="submit" class="btn btn-primary">Sign Up</button>
  </form>
    </div>


<?php
include("footer.php");
?>