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
        <link rel="stylesheet" href="../css/courses.css">
        <title>CVUT program</title>
    </head>
    <body class="programs">
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
        <img src="../images/courses/technical_background.jpg" alt="Prague" class="img_prague_courses cvut_program">
        <main class="container_program cvut_program">
            <div class="left_container_program">
                <div class="left_container_program_section_1">
                    <h1 class="h1_program cvut">Admission to CTU and technical specialties</h1>
                    <h3 class="h3_program cvut">This one-year course will prepare you to study architecture, engineering, civil aviation, nuclear or chemical engineering, biomedicine, information technology and programming, and other fields.</h3>
                    <p class="p_program cvut">The course will prepare you for admission to technical universities such as:</p>
                    <div class="university_links cvut">
                        <a href="" class="a_university_link">České vysoké účení v Praze</a>
                        <a href="" class="a_university_link">Česká zemědelská univerzita
                        </a>
                        <a href="" class="a_university_link">Vysoké učení technické v Brně</a>
                        <a href="" class="a_university_link">Technická univerzita v Liberci</a>
                        <a href="" class="a_university_link">Západočeská univerzita v Plzni</a>
                        <a href="" class="a_university_link">Vysoká škola chemicko-technologická v Praze</a>
                        <a href="" class="a_university_link">Univerzita Tomáše Bati ve Zlíně</a>
                    </div>
                    <p class="p_program cvut">As we have already written, high school in the Czech Republic is completely free, even for foreigners. The main requirements are a certificate confirming knowledge of the Czech language at level B1 or B2 and successful passing of entrance exams.</p>
                </div>
                <div class="title_line_university_program">
                    <div class="main_container_section_3_title section_title">
                        <h1 class="h1_program">Czech Technical University in Prague</h1>
                    </div>
                    <hr class="hr_title hr_title_program">
                    <p class="p_program title">Basic information</p>
                </div>
                <p class="p_program cvut">The oldest technical university in Central Europe and the oldest civilian technical university in the world. The university works closely with international companies, including Toyota, Skanska, Bosch, Siemens, Honeywell, GE, Rockwell, ABB Group, McKinsey, DaimlerChrysler, Skoda Auto, Ericsson and Vodafone - all students undergo internships there and are most often placed in these companies. .

                CTU is a huge and technological university: about 25 thousand students study here (and many foreigners). The prestige of the university is confirmed by high places in international rankings, for example, according to Quacquarelli Symonds (QS), CTU is among the best universities on the planet for 2021 and, after Charles and the University of Chemical Technology, ranks third in the Czech Republic.</p>
                <div class="title_line_university_program">
                    <div class="main_container_section_3_title section_title">
                        <h1 class="h1_program">Our program includes:</h1>
                    </div>
                    <hr class="hr_title hr_title_program includes">
                </div>
                <div class="includes_program_container">
                    <div class="includes_box">
                        <div class="head_includes_box">
                            <h3 class="h3_includes_box">Preparation and documentation</h3>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box">Aaccommodation and health insurance</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box">Preparing for an interview at the consulate</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Full package of visa documents</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Advices</p>
                        </div>                       
                    </div>
                    <div class="includes_box">
                        <div class="head_includes_box">
                            <h3 class="h3_includes_box">Maintenance and support</h3>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box">Meeting at the airport and transfere</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box">Accommodation, introduction to Prague</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Registration in the police</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Preparation of documents for nostrification</p>
                        </div>   
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Profiling (presentation of universities and specialties)</p>
                        </div> 
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Monitoring attendance and progress</p>
                        </div>                     
                    </div>
                    <div class="includes_box">
                        <div class="head_includes_box">
                            <h3 class="h3_includes_box">Study</h3>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box">640 hours of Czech language with different teachers</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box">145 hours of mathematics</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">145 hours of specialized subject</p>
                        </div>
                        <div class="p_img_box">
                            <img src="../images/courses/free-icon-verify-8358886.png" alt="Check mark" class="img_includes_box">
                            <p class="p_includes_box box">Terminology</p>
                        </div>                       
                    </div>
                </div>
            </div>
            <div class="course_box cvut_right_sticky_box">
                <div class="div_image_course_box sticky_cvut">
                    <h1 class="h1_course_box h1_sticky_cvut">Admission to CTU and technical specialties</h1>
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
                <button class="button_course_box" id="submitButton">Registration</button>
                <div class="modal_window" id="modal_window">
                    <div class="modal_content_container">
                        <h1>Registration form</h1>
                        <span id="close">x</span>
                        <form action="../php/register_program_form.php" id="form-course" method="post">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" required>
                            <label for="surname">Surname:</label>
                            <input type="text" name="surname" id="surname" required>
                            <label for="date">Date of birth:</label>
                            <input type="date" name="date" id="date" required>
                            <label for="phone">Telephone number:</label>
                            <input type="tel" name="phone" id="phone" required>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" required>
                            <label for="program">Choose your program:</label>
                            <select name="programs" id="program">
                                <option value="technical program">Technical program</option>
                                <option value="economical program">Economics program</option>
                                <option value="humanitarian program">Humanitarian program</option>
                                <option value="medical program">Medical program</option>
                                <option value="art program">Art program</option>
                            </select>
                            <input type="submit" id="sumbitButtonForm" value="Register">
                        </form>
                    </div>
                </div>
                <div id="successMessage" class="success-message">Application submitted successfully!</div>
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
        </footer>
        <script src="../js/course_modal.js"></script>
        <script src="../js/modal.js"></script>
    </body>
</html>