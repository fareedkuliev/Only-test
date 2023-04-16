<?php
session_start();

?>

<!doctype HTML>
<script src="https://www.google.com/recaptcha/api.js"></script>
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
            <h1 id="title"> Authorization form </h1>
        </header>
    </div>
    <div class="brd">
        <form id="survey-form" action="back/autorisation.php" method="post">
            <div class="form-group">
                <label id="email-label" for="email"> Email or Phone </label>
                <input type="text" name="emailOrPhone" id="email" class="form-group" placeholder="Enter your email or phone" required/>
            </div>
            <div class="form-group">
                <label id="name-label" for="password"> Password </label>
                <input type="text" name="password" id="password" class="form-control" placeholder="Enter your password" required/>
            </div>
            <div class="g-recaptcha" data-sitekey="6LfrN4klAAAAAFMycHE8l93KTC3ygZHNapn0f087" style="margin-bottom:1em"></div>
            <div class="form-group">
                <button type="submit" id="submit"
                        class="submit-button"> Submit </button>
            </div>
            <h4>Don't have a profile? <a href="index.php"> Click here </a></h4>
        </form>
    </div>
</div>
</div>
</body>
</html>


