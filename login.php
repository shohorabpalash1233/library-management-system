<?php 
	include 'lib/Session.php';
	Session::checkLogin();
?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/classes/StudentLogin.php');
?>

<?php
    $login = new StudentLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $studentLogin = $login->StudentLogin($_POST);
        
    }
?>

<style type="text/css" media="screen">
    .success{
        color: green;
        font-size: 20px;
    }
    .error{
        color: red;
        font-size: 20px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>User Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>

    <?php
        if (isset($studentLogin)) {?>
        <div class="alert alert-success col-lg-6 col-lg-push-3 text-center">
            <?php echo $studentLogin;?>
        </div>
    <?php       
        }
    ?>

</body>
</html>
