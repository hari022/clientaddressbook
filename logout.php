<?php
session_start();
if (!isset($_SESSION['username'])){
    header('location:login_register.php');
}else{
    // remove all session variables
    session_unset();

// destroy the session
    session_destroy();
}

include './includes/header.php'
?>

<div class="container" >

    <h1>You have been logout successfully.</h1>
    <a href="login_register.php"><button class="btn btn-danger lead">Log In</button></a>

</div>

<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>