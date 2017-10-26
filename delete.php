<?php
//Including database file and functions file
include './includes/connection.php';
include './includes/functions.php';
//checking sessions variable
if (!isset($_SESSION['username'])){
    header('location:login_register.php');
}
include './includes/header.php'
?>
<div class="container">


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <!--Check client ID and If available then get Client-->
            <?php
            if (isset($_GET['id'])){
                $row = getClient($_GET['id']);
            }
            ?>
            <!--Display Client Data-->
            <h1>Name: <?php echo " ".$row['firstName']." ".$row['lastName'];?></h1>
            <h2>Email iD:<?php echo " ". $row['email'];?></h2>
            <h3>Phone Number:<?php echo " ".$row['phoneNumber'];?></h3>
            <p class="lead"> are you sure you want to delete this client?</p>
            <!--Pass id to the list.php file-->
            <a href="list.php?id=<?php echo $row['id']?>"><button class="btn btn-danger">Delete</button></a>
            <a href="list.php"><button class="btn btn-warning">Cancel</button></a>

        </div>
    </div>


</div>


</div>

<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>