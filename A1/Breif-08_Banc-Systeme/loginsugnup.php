<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login and Signup with Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .text-danger {
            text-align: center;
            margin-left: 300px;
        }

        .no-login {
            text-align: center;
            margin-right: 300px;
            color: red;
        }

        .login {
            text-align: center;
            margin-right: 300px;
            color: green;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- <h3></h3>  -->
        <div class="row">
            <!-- Login Form -->
            <div class="col-md-6">
                <h2>Login</h2>
                <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <label for="loginUsername">Username</label>
                        <input type="text" class="form-control" id="loginUsername" placeholder="Enter your username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" name="pwd">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>

            <!-- Signup Form -->
            <div class="col-md-6">
                <h2>Sign Up</h2>
                <form action="includes\signup.php" method="post">
                    <div class="form-group">
                        <label for="signupUsername">Username</label>
                        <input type="text" class="form-control" id="signupUsername" placeholder="Choose a username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Password</label>
                        <input type="password" class="form-control" id="signupPassword" placeholder="Choose a password" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="signupPassword">Repeat The Password</label>
                        <input type="password" class="form-control" id="signupPassword" placeholder="Choose a password" name="pwdrpt">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Sign Up</button>
                </form>
            </div>
            <div class="col-md-2">
                <h2>logout</h2>
                <form action="includes\logout.php" method="post">
                    <button type="submit" class="btn btn-success" name="logout">logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container ">
        <?php
        session_start();
        if (isset($_SESSION['userid'])) {
            echo $_SESSION['userid'] . "<br/>";
            echo  $_SESSION['useruid'];
        }
        // check_signup_errors();
        // check_login_error();
        // var_dump($_SESSION) ;
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>