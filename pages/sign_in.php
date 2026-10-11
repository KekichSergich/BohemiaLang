<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200;300;400;600;800&family=Tilt+Neon&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/sign.css">
        <title>Sing in</title>
    </head>
    <body class="sign">
    <form action="../php/sign_in_process.php" method="post" enctype="multipart/form-data">

        <a href="index.php" class="a_logo a_fixed_head_links">BohemiaLang</a>
        <img src="../images/pc_reversed.png" class="img_form one" alt="pc">
        <img src="../images/marks.png" class="img_form two" alt="Marks">
        <img src="../images/hat.png" class="img_form three" alt="Hat">

        <div class="input_container">
            <div class="label_title">
                <label for="login">Login</label>
                <p>*is required</p> 
            </div> 
            <input type="text" id="login" name="login" required>
            <div class="error_text" id="login_error_text"></div>
        </div> 

        <div class="input_container">
            <div class="label_title">
                <label for="password">Password</label>
                <p>*is required</p>
            </div>     
            <input type="password" id="password" name="password" required>
            <div class="error_text" id="pass_error_text"></div>
        </div>               
        <input id="submitButton" type="submit" value="Sign in">

        <div class="account_question">
            <p>Are you not registered yet?</p>
            <a href="sign_up.php">Sign up</a>
        </div>

        </form>
        <script src="../js/validation_sign_in.js"></script>
    </body>
</html> 