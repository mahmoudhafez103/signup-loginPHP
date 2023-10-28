<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .signup-form {
            background-color: #f2f2f2;
            padding: 20px;
            display: inline-block;
            margin-top: 20px;
        }

        .signin-form {
            background-color: #e6e6e6;
            padding: 20px;
            display: inline-block;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 8px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            padding: 8px 20px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            cursor: pointer;
        }

        .navigation li {
            display: inline;
            margin: 10px;
        }

        .navigation a {
            text-decoration: none;
            color: #333;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["userid"]) && $_SESSION["userid"]) { //to check if the user login or not
    ?>
        <ul class="navigation">
            <li><a href="#"><?= 'Welcome ' . $_SESSION['useruid'] ?></a></li>
            <li><a href="includes/logout.inc.php">Logout</a></li>
        </ul>
    <?php } else { ?>
        <ul class="navigation">
            <li><a href="#" style="color:blue;">Sign In</a></li>
            <li><a href="#" style="color:green;">Sign Up</a></li>
        </ul>
    <?php }
    if (isset($_GET['error'])) { //to show the error
        print_r("<h5 class='error-message'>" . $_GET['error'] . "</h5>");
    }
    ?>
    <div class="signup-form">
        <h4>SIGN UP</h4>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
            <input type="text" name="email" placeholder="E-mail"><br><br>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>

    <div class="signin-form">
        <h4>SIGN IN</h4>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username"><br>
            <input type="password" name="pwd" placeholder="Password"><br><br>
            <button type="submit" name="submit">Sign In</button>
        </form>
    </div>
</body>

</html>