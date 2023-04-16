<?php
session_start();
?>

<!doctype HTML>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Register and auth</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="main">
  <div class="container">
    <header class="header">
      <h1 id="title"> Register form</h1>
    </header>
  </div>
  <div class="brd">
    <form id="survey-form" action="back/register.php" method="post">
      <div class="form-group">
          <label id="name-label" for="name"> Name </label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required/>
      </div>
      <div class="form-group">
            <label id="email-label" for="email"> Email </label>
            <input type="email" name="email" id="email" class="form-group" placeholder="Enter your email" required/>
      </div>
        <div class="form-group">
      <label id="phone-label" for="phone"> Phone number </label>
      <input type="text" name="phone" id="phone" min="11" max="15" class="form-group" placeholder="Enter your phone number" required/>
            </div>
        <div class="form-group">
            <label id="name-label" for="password"> Password </label>
            <input type="text" name="password" id="password" class="form-control" placeholder="Create your password" required/>
        </div>
        <div class="form-group">
            <label id="name-label" for="password"> Confirm password </label>
            <input type="text" name="confirm_password" id="password" class="form-control" placeholder="Confirm your password" required/>
        </div>
        <div class="form-group">
          <button type="submit" id="submit"
                  class="submit-button"> Submit</button>
        </div>
        <h4>Do you already have a profile? <a href="auth.php"> Click here </a></h4>
        <?php
        if(isset($_SESSION['message'])){
            echo '<p class="message">' . $_SESSION['message'] . '</p>';
        } unset($_SESSION['message']);
        ?>
    </form>
</div>
  </div>
</div>
</body>
</html>

