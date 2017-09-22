<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/classes/Student.php');
?>

<?php
    $stu = new Student();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $studentRegister = $stu->studentRegister($_POST);
        
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

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>



<body class="login" style="margin-top: -20px;">




    <div class="login_wrapper">


            <section class="login_content" style="margin-top: -40px;">
                <form action="" method="post">
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
                    </div>

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="contact" name="contact" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="SEM" name="sem" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Enrollment No" name="enrollmentno" required=""/>
                    </div>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit" value="Register">
                    </div>

                </form>
            </section>



    </div>

    <?php
        if (isset($studentRegister)) {?>
        <div class="alert alert-success col-lg-6 col-lg-push-3 text-center">
            <?php echo $studentRegister;?>
        </div>
    <?php       
        }
    ?>


    


</body>
</html>
