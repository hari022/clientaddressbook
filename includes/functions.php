<?php
//Include database file
include 'connection.php';
//Start server
session_start();

//Function to validate data for special characters
function validateData($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Save data to users table
function saveData($fname, $lname, $email, $password){
    global $conn;
    $query = "INSERT INTO users (firstName, lastName, email, password)
VALUES ('$fname', '$lname', '$email', '$password')";
    $save = mysqli_query($conn, $query);

    if ($save){
        return true;
    }else{
        return false;
    }

}

//Save data to the client table
function saveClient($fname, $lname, $email, $phoneNumber){
    global $conn;
    $query = "INSERT INTO clients (firstName, lastName, email, phoneNumber)
VALUES ('$fname', '$lname', '$email', '$phoneNumber')";
    $save = mysqli_query($conn, $query);

    if ($save){
        return true;
    }else{
        return false;
    }
}

//Edit client data
function editClient($fname, $lname, $email, $phoneNumber, $id){
    global $conn;
    $query = "UPDATE clients SET firstName = '$fname', lastName = '$lname', email = '$email', phoneNumber = '$phoneNumber' WHERE id= '$id' ";
    $edit = mysqli_query($conn, $query);

    if ($edit){
        return true;
    }else{
        return false;
    }

}

//Check for existing user
function verifyExistingUser($email){
    global $conn;
    $query = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0){
       return true;
    }else{
        return false;
    }
}

//Get all the clients
function getClients(){
    global $conn;
    $query = "SELECT * FROM clients ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td> <?php echo $row['firstName']?></td>
                <td> <?php echo $row['lastName']?></td>
                <td> <?php echo $row['email']?></td>
                <td> <?php echo $row['phoneNumber']?></td>
                <td><a href="edit.php?id=<?php echo $row['id']?>"><button class="btn btn-primary">Edit</button></a></td>
                <td><a href = "delete.php?id=<?php echo $row['id']?>"><button  class="btn btn-danger">Delete</button></a></td>
            </tr>
<?php

        }
    }

}
//Get single client
function getClient($id){
    global $conn;
    $query = "SELECT * FROM clients WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
            return $row;
        }
    }

}
//Delete client
function deleteClient($id){
    global $conn;
    $query = "DELETE FROM clients WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result){
        return true;
    }else{
        return false;
    }

}

//Verify for existing client using email address
function verifyExistingClient($email){
    global $conn;
    $query = "SELECT * FROM clients WHERE email = '$email' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0){
        return true;
    }else{
        return false;
    }
}

//Login to the system
function logIn($email, $password){
    global $conn;
    $fetched_password = '';
    $username = "";
    $query = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)){
//            echo $row['email']." ". $row['password'];
            $fetched_password = $row['password'];
            $username = $row['firstName']." ".$row['lastName'];

        }
    }
        if (password_verify($password, $fetched_password)) {
        $_SESSION['username'] = $username;
            return true;
        }
        else {
            return false;
        }

}