<?php
//Include Database and Functions file
include './includes/connection.php';
include './includes/functions.php';
if (!isset($_SESSION['username'])){
    header('location:login_register.php');
}
//Variables for alerts
$loginSuccess = 'Hello'." ". $_SESSION['username'];
$addClientFailed="";
$addClientSuccess="";
$clientDeleted= "";
$editClient = "";
//Check for data from edit form
if (isset($_POST['edit_submit'])){
//   echo $_POST['id'];
   if (editClient($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phonenumber'], $_POST['id'])){
       $editClient = "Cient Edited";
   }else{
       $editClient = "something went wrong";
   }
}
//Check for data from Delete form
if (isset($_GET['id'])){
    if (deleteClient($_GET['id'])){
        $clientDeleted = 'Client Successfully Deleted';
    }else{
        $clientDeleted = 'something went wrong, Please try again';
    }
}
//Check for data from Add Client form form
if (isset($_POST['submit'])){
    if ($_POST['fname'] && $_POST['lname'] && $_POST['email'] && $_POST['phonenumber']){

        $firstName = validateData($_POST['fname']);
        $lastName =  validateData($_POST['lname']);
        $email = validateData($_POST['email']);
        $phoneNumber = validateData($_POST['phonenumber']);
        if (verifyExistingClient($email)){
            $addClientFailed = 'Client already exist';

        }else{
            if (saveClient($firstName, $lastName, $email, $phoneNumber)){
                $addClientSuccess = 'Client Added';
            }else{
                $addClientFailed = 'Something went wrong, please try again';
            }
        }

    }else{
        $addClientFailed = 'Please fill all the fields';

    }

}
include './includes/header.php'
?>
<div class="container">
<!--Alert Messages-->
    <?php
    if ($loginSuccess){
        echo '<div class="alert alert-success" role="alert">'.$loginSuccess.'</div>';
    }
    if ($addClientSuccess){
        echo '<div class="alert alert-success" role="alert">'.$addClientSuccess.'</div>';
    }elseif($addClientFailed) {
        echo '<div class="alert alert-success" role="alert">' . $addClientFailed . '</div>';
    }
    if ($clientDeleted){
        echo '<div class="alert alert-success" role="alert">'.$clientDeleted.'</div>';
    }
    if ($editClient){
        echo '<div class="alert alert-success" role="alert">'.$editClient.'</div>';
    }

    ?>
<!--Display Clients using Tables-->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Edit Client</th>
            <th scope="col">Delete Client</th>
        </tr>
        </thead>
        <tbody>
        <?php getClients();?>
        </tbody>
    </table>


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