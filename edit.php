<?php
//Include database and functions file
include './includes/connection.php';
include './includes/functions.php';
//Check session variables
if (!isset($_SESSION['username'])){
    header('location:login_register.php');
}
include './includes/header.php'
?>

    <div >
            <!--Check for ID-->
            <?php
            if (isset($_GET['id'])){
                $row = getClient($_GET['id']);
            }
            ?>
                <!--Edit Form-->
            <form action=list.php method="post">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8"><h1>Edit Client</h1></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4"> <div class="form-group">
                            <label for="fname">First Name</label>
                            <input value="<?php echo $row['firstName'];?>" type="text" class="form-control" id="fname" name="fname">
                        </div></div>
                    <div class="col-md-4"> <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input value="<?php echo $row['lastName'];?>" type="text" class="form-control" id="lname" name="lname">
                        </div></div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4"><div class="form-group">
                            <label for="email">Email address:</label>
                            <input value="<?php echo $row['email'];?>" type="email" class="form-control" id="email" name="email">
                        </div></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phonenumber">Phone Number:</label>
                            <input  value="<?php echo $row['phoneNumber'];?>" type="number" class="form-control" id="phonenumber" name="phonenumber">
                            <input  value="<?php echo $row['id'];?>" type="hidden" class="form-control" id="phonenumber" name="id">
                        </div></div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4"> <button name="edit_submit" type="submit" class="btn btn-primary">Edit</button>
                    <a href="list.php"><button class="btn btn-warning">Cancel</button></a></div>
                </div>
            </form>

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