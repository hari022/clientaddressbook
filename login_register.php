<?php

include './includes/connection.php';
include './includes/functions.php';
$alert = '';
$loginSuccess='';
$loginFailed='';
$registrationFailed='';
$registrationSuccess='';

if(isset($_POST['login_submit'])){
    if ($_POST['email'] && $_POST['password']){

        $email = validateData($_POST['email']) ;
        $password = validateData($_POST['password']);
        if (logIn($email, $password)){
            header('location: list.php');
            $loginSuccess = 'Hello'." ". $_SESSION['username'];
        }else{
            $loginFailed = 'Invalid username and password combination';
        }
    }else{
        $loginFailed = 'Please fill all the fields';

    }
}
elseif (isset($_POST['register_submit'])){
    if ($_POST['fname'] && $_POST['lname'] && $_POST['email'] && $_POST['password']){

        $firstName = validateData($_POST['fname']);
        $lastName =  validateData($_POST['lname']);
        $email = validateData($_POST['email']);
        $password = validateData($_POST['password']);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if (verifyExistingUser($email)){
            $registrationFailed = 'user alredy exixt, please use another email.';

        }else{
            if (saveData($firstName, $lastName, $email, $hash)){
                $registrationSuccess = 'User Registered';
            }else{
                $registrationFailed = 'Something went wrong, please try again';
            }
        }

    }else{
        $registrationFailed = 'Please fill all the fields';

    }

}
include './includes/header.php'
?>

<div class="container">

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#Login"><h1>LogIn</h1></a></li>
        <li><a data-toggle="tab" href="#Register"><h1>Register</h1></a></li>
    </ul>

    <div class="tab-content">
        <div id="Login" class="tab-pane fade in active">
            <div class="row">
                <div class="col-md-6">
                    <h3>Login</h3>
                    <!--Log in Form-->
                    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                        <button name="login_submit" type="submit" class="btn btn-default">Submit</button>

                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>

        </div>
        <div id="Register" class="tab-pane fade">

            <div class="row">
                <div class="col-md-6">
                    <h3>Register</h3>
                    <!--Submit Form-->
                    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                        <button name="register_submit" type="submit" class="btn btn-default">Submit</button>

                    </form>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
<!--Alert Messages-->
    <?php
    if ($loginSuccess){
        echo '<div class="alert alert-success" role="alert">'.$loginSuccess.'</div>';
    }elseif($loginFailed){
        echo '<div class="alert alert-success" role="alert">'.$loginFailed.'</div>';
    }elseif($registrationSuccess){
        echo '<div class="alert alert-success" role="alert">'.$registrationSuccess.'</div>';
    }elseif($registrationFailed){
        echo '<div class="alert alert-success" role="alert">'.$registrationFailed.'</div>';
    }

    ?>


</div>

<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>