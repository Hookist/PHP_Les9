<?php
    include("User.php");
    $user = new User();
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if ($user->CheckUser($_POST['username'], $_POST['password']))
        {
            echo "PRAViLNO";
            $_SESSION['username'] = $_POST['username'];
            echo '<script type="text/javascript"> window.location = "http://localhost/PHP_Les9/admin/index.php" </script>';
        }
    }
?>

<html>
<title>

</title>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


    <link href="mystylesheet.css" rel="stylesheet">

</head>


<body>

<div class = "container">
    <div class="wrapper">

        <form action="" method="post" name="Login_Form" class="form-signin">
            <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
            <hr class="colorgraph"/><br>
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="username" required="" autofocus="">
            </div>



            <div class="input-group">
                <input type="password" class="form-control" placeholder="Password" aria-label="Amount (to the nearest dollar)" name="password" required="">

            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit">
                AUTORIZE

            </button>

        </form>
    </div>
</div>


</body>
</html>
