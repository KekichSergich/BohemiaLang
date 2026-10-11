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
        <link rel="stylesheet" href="../css/users.css">
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
        <main class="container users">
            <div>
                <h1 class="h1_users">Users list</h1>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th id="user_login">Login</th>
                                <th id="id">ID</th>
                                <th id="delete">Delete User</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // Connect to the file containing user data
                                $data = file_get_contents("../data/users.json");
                                // Decode JSON data
                                $users_list = json_decode($data, true) ?? [];
                                // Get the total number of users
                                $total_users = count($users_list);

                                // determine the page
                                if (isset($_GET["page"])) {
                                    $page = $_GET["page"];
                                } else {
                                    $page = 1;
                                }

                                //get users for the current page
                                $users_in_the_table = []; 
                                for ($index = ($page - 1) * 7; $index < $page * 7; $index++) {
                                    if (isset($users_list[$index])) {
                                        $users_in_the_table[] = $users_list[$index];
                                    }
                                }
                            ?>
                            <?php foreach ($users_in_the_table as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user["login"]); ?></td>
                                    <td><?php echo htmlspecialchars($user["id"]); ?></td>
                                    <td>
                                        <form action="../php/delete_user.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user["id"]); ?>">
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr> 
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav>
                        <ul>
                            <?php
                                // Output the link with another pages
                                for ($i = 1; $i <= ceil($total_users / 7); $i++) {
                                    echo '<li' . ($page == $i ? ' class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
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
        </footer>
        <script src="../js/modal.js"></script>
    </body>
</html>