<?php
    include("DBContext.php");

    $connector = new Connector();

    $connector->RegisterNewUser($_POST['username'], $_POST['password'], $_POST['repassword']);
 
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
        <form action="" method="post" class="form-signin">
            <h3 class="form-signin-heading">Please register</h3>
            <hr class="colorgraph"><br>
            <div class="input-group">

                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="username" required="" autofocus="">
            </div>

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Login" aria-describedby="basic-addon2"
                       name="mail">


            </div>

            <div class="input-group">

                <input type="text" class="form-control" placeholder="password" aria-label="Amount (to the nearest dollar)" name="password">

            </div>

            <div class="input-group">

                <input type="text" class="form-control" placeholder="password again" aria-label="Amount (to the nearest dollar)" name="repassword">

            </div>
            <button type="submit"  class="btn btn-lg btn-primary btn-block">
                Registr

            </button>
        </form>
    </div>
</div>
</body>
</html>
