<?php
session_start();
if (!isset($_SESSION['email'])){
    header('location:index.php');
}

$firstname=$lastname=$email=$password_1='';
include 'config.php';



if (isset($_POST['signup'])){
    //Form validation

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //Grab data for the firstname

    if (empty($firstname)){
        header('location:signup.php?f_error');
        exit();
    }else{
        $firstname = $firstname;
    };

    //Grab data for the lastname

    if (empty($lastname)){
        header('location:signup.php?l_error');
        exit();
    }else{
        $lastname = $lastname;
    };

    //Grab data for the email


    if (empty($email)){
        header('location:signup.php?e_error');
        exit();
    }else{
        $email = $email;
    };

    //Grab data for the password

    if (empty($password_1)){
        header('location:signup.php?p1_error');
        exit();
    }else{
        $password_1 = $password_1;
    }

    if ($password_1 != $password_2){
        header('location.signup.php?p2_error');
        exit();
    }else{
        $password_2 = md5($password_1);
    }


    if (isset($_POST['password'])){
        $password_1 = $_POST['password_1'];
    }else{
        header('location:signup.php?p1_error');
    };

    if (isset($_POST['password'])){
        $password_2 = $_POST['password_2'];
    }else{
        header('location:signup.php?p2_error');
    };



    if ($password_1!= $password_2){


        header('location:signup.php?pm_error');
    }

    //Grabbing data for the date

    if (isset($_POST['date'])){
        $date = $_POST['date'];
    }else{
        $date_err = "Date is required";
    };


    //Fetch a user from the database who has the same firstname and or email limiting the returned results to one.

    $sql="SELECT * FROM `users` WHERE firstname='$firstname' OR email='$email' LIMIT 1 ";

    //Store the returned data from the database in a variable called results

    $results = mysqli_query($conn, $sql);

    //Convert results into an associative array for better data management in PHP

    $user = mysqli_fetch_assoc($results);

    //If teh user is found we will redirect to the signup page with an error msg saying user with firstname or email already exists

    if ($user){
        header('location:signup.php?user_error');
    }

    //If there is no error, go ahead and add a user to the database


    //Creating connection to the database
    //And checks if the connection is successful




    $sql = "INSERT INTO `users`(`id`,`firstname`, `lastname`, `email`, `password`, `date`) VALUES (null,'$firstname','$lastname','$email','$password','$date')";

    //Save user to the database
    //First check if the insertion to the database is successful
    //mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)){
        //If adding user is successful

        echo "User added to the database successfully";

        $_SESSION['email'] = $email;
        header("location:index.php");
    }else{
        //If adding user isn't successful

        echo "Failed to add user to the database";
    }









}

?>