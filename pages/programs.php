<?php
session_start();
$login = "";
$file_path = "";
$admin = false;
$file_folder = '../data/uploads/';

$data = file_get_contents("../data/users.json");
$users_list = json_decode($data, true) ?? [];

if (isset($_SESSION["avatar"])) {
    $file_path = $file_folder . $_SESSION["avatar"];
    $login = $_SESSION["login"];
    $current_login = $login;
}
if (!isset($_SESSION["admin"])) {
    $admin = false;
} elseif ($_SESSION["admin"] == true){
    $admin = true;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200;300;400;600;800&family=Tilt+Neon&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/courses.css">
        <title>Courses and programs</title>
    </head>
    <body>
        <header>
            <div class="fixed_head container">
                <a href="index.php" class="a_logo a_fixed_head_links">
                    BohemiaLang <?php if ($admin == true){ echo "<span>Admin</span>"; }
                    ?>
                </a>
                <div class="fixed_head_links">
                    <a href="working.html" class="a_fixed_head_links">About us</a>
                    <a href="programs.php" class="a_fixed_head_links">Courses and programs</a>
                    <a href="working.html" class="a_fixed_head_links">Holidays in CR</a>
                    <?php
                        if ($admin == true){ 
                            echo '<a href="users.php" class="a_fixed_head_links">Users</a>'; 
                        }
                    ?>
                </div>
                <div class="div_fixed_head_buttons">
                    <?php
                        if (isset($_SESSION["login"])) {
                            echo 
                                "<div class='user_profile'> 
                                    <div class='user_profile_container'>
                                        <h4 class='span_login' id='h4_login'>" . htmlspecialchars($login) . "</h4> 
                                        <div class='logout_edit'>
                                            <a href='../php/logout.php'>Log out</a>
                                            <button id='editButton'>Edit</button>
                                        </div>
                                        
                                    </div>
                                    <img class='user_img' src='$file_path' alt='User profile image'>
                                </div> 
                                    
                                ";
                        } else {
                            echo '<a href="sign_in.php" class="a_fixed_head_button sing_in">Sign in</a>';
                            echo '<a href="sign_up.php" class="a_fixed_head_button sing_up">Sign up</a>';
                        }
                    ?>                 
                </div> 
                <!-- Modal window -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <nav>
                            <button id="edit_login_button">Edit login</button>
                            <button id="edit_password_button">Edit password</button>
                            <span class="close">&times;</span>
                        </nav>
                        

                        <form id="edit_login" action="../php/edit_login.php" method="post">
                            <label for="login">Edit login:</label>
                            <input type="text" id="login" name="login" value="<?php if(isset($current_login)) { echo htmlspecialchars($current_login);} ?>" required>
                            <input type="submit" id="loginSubmit" class="submitModal" value="Save login">
                            <div class="errorTextModal" id="errorLogin"></div>
                        </form>

                        <form id="edit_password" action="../php/edit_password.php" method="post">
                            <label>Edit password:</label>
                            <label for="new_pass">New password:</label>
                            <input type="password" id="new_pass" name="new_pass" required>
                            <div class="errorTextModal" id="errorPass"></div>

                            <input type="submit" class="submitModal" id="passSubmit" value="Save Changes">
                        </form>
                    </div>
                </div>
                <!-- Modal window -->
            </div>
        </header>
        <img src="../images/prague_background.jpg" alt="Prague" class="img_prague_courses">
        <main class="container main_container main_container_courses">
            <h1 class="h1_courses_title">Programs</h1>
            <div class="cours_boxes_container">
                <div class="course_box">
                    <div class="div_image_course_box" id="technical">
                        <h1 class="h1_course_box">Admission to ČVUT and technical specialties</h1>
                    </div>
                    <div class="columns_text_course_box">
                        <div class="first_column_text">
                            <p class="p_text_course_box">Start date</p>
                            <h3 class="h3_text_course_box">Oct. 1st 2024</h3>
                            <p class="p_text_course_box">Place</p>
                            <h3 class="h3_text_course_box">Prague</h3>
                            <p class="p_text_course_box">Price</p>
                            <h3 class="h3_text_course_box h3_price">5400</h3>
                        </div>
                        <div class="second_column_text">
                            <p class="p_text_course_box">Duration</p>
                            <h3 class="h3_text_course_box">12 months</h3>
                            <p class="p_text_course_box">Number of hours</p>
                            <h3 class="h3_text_course_box">930</h3>
                        </div>
                    </div>         
                    <a href="cvut_program.php" class="a_course_box">Find out more</a>
                </div>
                <div class="course_box">
                    <div class="div_image_course_box" id="economics">
                        <h1 class="h1_course_box">Admission to VŠE and economics specialties</h1>
                    </div>
                    <div class="columns_text_course_box">
                        <div class="first_column_text">
                            <p class="p_text_course_box">Start date</p>
                            <h3 class="h3_text_course_box">Oct. 1st 2024</h3>
                            <p class="p_text_course_box">Place</p>
                            <h3 class="h3_text_course_box">Prague</h3>
                            <p class="p_text_course_box">Price</p>
                            <h3 class="h3_text_course_box h3_price">5400</h3>
                        </div>
                        <div class="second_column_text">
                            <p class="p_text_course_box">Duration</p>
                            <h3 class="h3_text_course_box">12 months</h3>
                            <p class="p_text_course_box">Number of hours</p>
                            <h3 class="h3_text_course_box">930</h3>
                        </div>
                    </div>         
                    <a href="working.html" class="a_course_box">Find out more</a>
                </div>
                <div class="course_box">
                    <div class="div_image_course_box" id="humanitarian">
                        <h1 class="h1_course_box">Admission to UK and humanitarian specialties</h1>
                    </div>
                    <div class="columns_text_course_box">
                        <div class="first_column_text">
                            <p class="p_text_course_box">Start date</p>
                            <h3 class="h3_text_course_box">Oct. 1st 2024</h3>
                            <p class="p_text_course_box">Place</p>
                            <h3 class="h3_text_course_box">Prague</h3>
                            <p class="p_text_course_box">Price</p>
                            <h3 class="h3_text_course_box h3_price">5400</h3>
                        </div>
                        <div class="second_column_text">
                            <p class="p_text_course_box">Duration</p>
                            <h3 class="h3_text_course_box">12 months</h3>
                            <p class="p_text_course_box">Number of hours</p>
                            <h3 class="h3_text_course_box">930</h3>
                        </div>
                    </div>         
                    <a href="working.html" class="a_course_box">Find out more</a>
                </div>
                <div class="course_box">
                    <div class="div_image_course_box" id="medical">
                        <h1 class="h1_course_box">Admission on medical specialties</h1>
                    </div>
                    <div class="columns_text_course_box">
                        <div class="first_column_text">
                            <p class="p_text_course_box">Start date</p>
                            <h3 class="h3_text_course_box">Oct. 1st 2024</h3>
                            <p class="p_text_course_box">Place</p>
                            <h3 class="h3_text_course_box">Prague</h3>
                            <p class="p_text_course_box">Price</p>
                            <h3 class="h3_text_course_box h3_price">5400</h3>
                        </div>
                        <div class="second_column_text">
                            <p class="p_text_course_box">Duration</p>
                            <h3 class="h3_text_course_box">12 months</h3>
                            <p class="p_text_course_box">Number of hours</p>
                            <h3 class="h3_text_course_box">930</h3>
                        </div>
                    </div>         
                    <a href="working.html" class="a_course_box">Find out more</a>
                </div>
                <div class="course_box">
                    <div class="div_image_course_box" id="art">
                        <h1 class="h1_course_box">Admission to UMPRUM and art specialties</h1>
                    </div>
                    <div class="columns_text_course_box">
                        <div class="first_column_text">
                            <p class="p_text_course_box">Start date</p>
                            <h3 class="h3_text_course_box">Oct. 1st 2024</h3>
                            <p class="p_text_course_box">Place</p>
                            <h3 class="h3_text_course_box">Prague</h3>
                            <p class="p_text_course_box">Price</p>
                            <h3 class="h3_text_course_box h3_price">5400</h3>
                        </div>
                        <div class="second_column_text">
                            <p class="p_text_course_box">Duration</p>
                            <h3 class="h3_text_course_box">12 months</h3>
                            <p class="p_text_course_box">Number of hours</p>
                            <h3 class="h3_text_course_box">930</h3>
                        </div>
                    </div>         
                    <a href="working.html" class="a_course_box">Find out more</a>
                </div>
            </div>
        </main>
        <footer>
            <div class="content container">
                <ul class="left">
                    <li>
                        <a href="programs.php" class="title">Our programs</a>
                        <a href="cvut_program.php">Technical program</a>
                        <a href="working.html">Economics program</a>
                        <a href="working.html">Humanitarian program</a>
                        <a href="working.html">Medical program</a>
                        <a href="working.html">Art program</a>
                    </li>
                    <li>
                        <a href="working.html" class="title">Holidays in Czech Republic</a>
                        <a href="working.html">Summer holidays</a>
                        <a href="working.html">Winter holidays</a>
                    </li>
                    <li>
                        <a href="working.html" class="title">About us</a>
                    </li>
                </ul>
                <ul class="right">
                    <li>
                        <h3>Contact us</h3>
                    </li>
                    <li>
                        <h3 id="info">info@bohemia_language_school.com</h3>
                    </li>
                    <li>
                        <h3>Follow us on</h3>
                    </li>
                    <li class="socail">
                        <a href="https://www.facebook.com/"><img src="../images/footer/facebook.png" alt="facebook"></a>
                        <a href="https://www.instagram.com/"><img src="../images/footer/instagram.png" alt="instagram"></a>
                        <a href="https://web.telegram.org/"><img src="../images/footer/telegram.png" alt="telegram"></a>
                        <a href="https://twitter.com/"><img src="../images/footer/twitter.png" alt="twitter"></a>
                    </li>
                </ul>
            </div>
            <script src="../js/modal.js"></script>
        </footer>
    </body>
</html>