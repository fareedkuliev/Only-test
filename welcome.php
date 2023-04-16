<?php
session_start();
if(!$_SESSION['user']){
    header("Location: /index.php");
}
?>
<!doctype HTML>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="main">
  <div class="container">
    <header class="header">
      <h1 id="title"> Welcome to your profile!</h1>
    </header>
  </div>
  <div class="welcome">
          <div class="welcome-group">
              <label> <p2 class="p2"><?php echo $_SESSION['user']['name']
                      ?></p2></label>
          </div>
          <div class="welcome-group">
              <label><p2 class="p2"><?php echo $_SESSION['user']['email']
                      ?></p2></label>
          </div>
          <div class="welcome-group">
              <label><p2 class="p2"><?php echo $_SESSION['user']['phone']
                      ?></p2></label>
          </div>
  </div>
      <div class="welcome1">
          <form id="survey-form" action="back/profile.php" method="post">
          <div class="form-group">
              <label id="name-label" for="name"> Name </label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Update your name"/>
          </div>
              <div class="form-group">
                  <label id="email-label" for="email"> Email </label>
                  <input type="email" name="email" id="email" class="form-group" placeholder="Update your email"/>
              </div>
              <div class="form-group">
                  <label id="phone-label" for="phone"> Phone number </label>
                  <input type="text" name="phone" id="phone" min="11" max="15" class="form-group" placeholder="Update your phone number"/>
              </div>
              <div class="form-group">
                  <label id="name-label" for="password"> Password </label>
                  <input type="text" name="password" id="password" class="form-control" placeholder="Update your password"/>
              </div>
              <div class="form-group">
                  <button type="submit" id="submit" class="submit-button"> Update data </button>
              </div>
              <?php
              if(isset($_SESSION['message'])){
                  echo '<p class="message">' . $_SESSION['message'] . '</p>';
              } unset($_SESSION['message']);
              ?>
          </form>
      </div>
    <div class="welcome1">
    <div class="form-group">
        <button type="submit" id="submit" class="submit-button"> <a href="back/logout.php"> Exit </a></button>
    </div>
    </div>
</div>
</body>
</html>

