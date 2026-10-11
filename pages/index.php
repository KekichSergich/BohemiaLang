<?php
session_start();
$login = "";
$file_path = "";
$admin = false;
$file_folder = '../data/uploads/';
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
        <title>Bohemia Language School</title>
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
        <section class="first_view">
            <div class="container">
                <div class="left">
                    <div class="text">
                        <h1>An unique approach to learning Czech</h1>
                        <p>In addition to school, learn at your own pace at home, in the yard or in the park with access to our mobile app or educational website!</p>
                    </div>
                    <a href="programs.php" class="start">Get started</a>
                </div>
                <div class="right">
                    <div class="img-container">
                        <img src="../images/students_section.png" alt="Students" class="students">
                    </div>
                </div>
            </div>
        </section>
        <section class="container container_advantages">
            <p>Why choose Czech Republic</p>
            <h2 class="h1_main_container_section_1">Advantages</h2>
            <ul>
                <li>
                    <img src="../images/advantages_box/university.png" alt="university">
                    <p>Studying abroad</p>
                </li>
                <li>
                    <img src="../images/advantages_box/EU.png" alt="EU">
                    <p>European diploma</p>
                </li>
                <li>
                    <img src="../images/advantages_box/quality_education.png" alt="Education">
                    <p>Quality education</p>
                </li>
                <li>
                    <img src="../images/advantages_box/free_education.png" alt="free education">
                    <p>Free education</p>
                </li>
                <li>
                    <img src="../images/advantages_box/safety.png" alt="safety">
                    <p>Safety</p>
                </li>
                <li>
                    <img src="../images/advantages_box/quality_life.png" alt="Three stars">
                    <p>Good life's quality</p>
                </li>
                <li>
                    <img src="../images/advantages_box/employment.png" alt="Summary">
                    <p>A large number of free vacancies</p>
                </li><li>
                    <img src="../images/advantages_box/cr.png" alt="Czech Republic">
                    <p>The heart of Europe</p>
                </li>
            </ul>
        </section>
        <div class="university_wrapper">
            <section class="container universities">
                <div class="text">
                    <h1>More than 2000 students were accepted in czech universities with our help</h1>
                    <p>Universities that our students study in:</p>
                </div>
                <ul class="images">
                    <li><img src="../images/universities/charles_university_logo.webp" alt="Charles University"  id="1"></li>
                    <li><img src="../images/universities/cvut_logo.webp" alt="CVUT" id="2"></li>
                    <li><img src="../images/universities/vse_logo.webp" alt="VSE" id="3"></li>
                    <li><img src="../images/universities/masarykova_logo.webp" alt="Masarykov University" id="4">
                    <li><img src="../images/universities/vsht_logo.webp" alt="VSHT" id="5"></li>
                    <li><img src="../images/universities/vsup_logo.webp" alt="VSUP" id="6"></li>
                </ul>
                <a href="programs.php">Find out more</a>
            </section>
        </div>
        <section class="container post_univ programs">
            <div class="section_head">
                <div class="first_line">
                    <h2>Our programs</h2>
                    <a href="programs.php">All programs</a>
                </div>
                <hr>
                <p>Czech language and specialized subjects</p>
            </div>
            <ul>
                <li>
                    <a href="cvut_program.php">
                        <img src="../images/programs/technical.png" alt="Chip" id="img_programs_1">
                        <h3>Preparing for admission to a Czech Technical University</h3>
                        <p>technical specialties</p>
                    </a>
                    <div class="back">
                        <img src="../images/universities/cvut_logo.webp" alt="CVUT" id="img_program_logo_1">
                    </div>
                </li>
                <li>
                    <a href="working.html">
                        <img src="../images/programs/financial.png" alt="Counter" id="img_programs_2">
                        <h3>Preparing for admission to a University of Economics and Business</h3>
                        <p>economic specialties</p>
                    </a>
                    <div class="back">
                        <img src="../images/universities/vse_logo.webp" alt="VSE" id="img_program_logo_2">
                    </div>
                </li>
                <li>
                    <a href="working.html">
                        <img src="../images/programs/medical.png" alt="Medical Iniversity" id="img_programs_3">
                        <h3>Preparing for admission to a medical universities</h3>
                        <p>medical specialties</p>
                    </a>
                    <div class="back">
                        <img src="../images/programs/sz_logo.png" alt="SZ" id="img_program_logo_3">
                    </div>
                </li>
                <li id="hum_print">
                    <a href="working.html">
                        <img src="../images/programs/hum.png" alt="Book" id="img_programs_4">
                        <h3>Preparing for admission to a Charles University</h3>
                        <p>humanitarian specialties</p>
                    </a>
                    <div class="back">
                        <img src="../images/universities/charles_university_logo.webp" alt="UK" id="img_program_logo_4">
                    </div>
                </li>
            </ul>
        </section>
        <section class="container post_univ holidays">
            <div class="section_head">
                <div class="first_line">
                    <h2>Holidays in Europe</h2>
                </div>
                <hr>
                <p>Czech Republic and traveling to other countries</p>
            </div>
            <ul class="holidays">
                <li>
                    <a href="working.html">
                        <div class="background">
                            <img src="../images/holidays/icon_summer.png" alt="Summer tree">
                        </div>
                        <h3>Summer holidays in Prague</h3>
                        <p>From 14th to 28th july</p>
                    </a>
                </li>
                <li>
                    <a href="working.html">
                        <div class="background winter">
                            <img src="../images/holidays/icon_winter.png" alt="Summer tree">
                        </div>
                        <h3>Winter holidays in Prague</h3>
                        <p>From 14th to 28th December</p>
                    </a>
                </li>
            </ul>
        </section>
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
        </footer>
        <script src="../js/modal.js"></script>
    </body>
</html>