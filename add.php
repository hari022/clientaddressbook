<?php
//Starting session and checking for available variables..
session_start();
if (!isset($_SESSION['username'])){
    header('location:login_register.php');
}
include './includes/header.php'
?>
<!--Form to add new clients-->
<form action=list.php method="post">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"><h1>Add Client</h1></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4"> <div class="form-group">

                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
            </div></div>
        <div class="col-md-4"> <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
            </div></div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4"><div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div></div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="number" class="form-control" id="phonenumber" name="phonenumber">
            </div></div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"> <button name="submit" type="submit" class="btn btn-primary">Submit</button></div>
    </div>
</form>
    </div>


<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>