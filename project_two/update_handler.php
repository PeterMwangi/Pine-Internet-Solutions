<?php

if (isset($_POST['btn_update'])){
    //Form validation

    if (isset($_POST['id'])){
        $id = $_POST['id'];
    }

        //Grab data for the firstname

        if (isset($_POST['firstname'])){
            $firstname = $_POST['firstname'];
        }else{
            $firstname_err = "First name is required";
        };

        //Grab data for the lastname

        if (isset($_POST['lastname'])){
            $lastname = $_POST['lastname'];
        }else{
            $lastname_err = "Last name is required";
        };

        //Grab data for the email


        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }else{
            $email_err = "email is required";
        };

        //Grab data for the password



        include 'config.php';

        $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email' WHERE id=$id";

        mysqli_query($conn, $sql);
        header("location:index.php");


}






?>