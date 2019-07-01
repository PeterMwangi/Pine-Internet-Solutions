<?php include 'header.php'?>
<?php

include "config.php";

session_start();
if (!isset($_SESSION['email'])){
    header('location:signup.php');
}


?>

    <div class="container">
        <div class="jumbotron">
            <h3 style="text-align: center">Welcome to Pine Internet Solutions</h3>
            <h4 style="text-align: center">Home To All Your IT Solutions</h4>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            //Creating a query/instruction to the database

            $sql = "SELECT * FROM `users`";

            //Fetching data from the database by issuing the query
            //The data will be stored in the variable '$fetched_results'
            $fetched_results = mysqli_query($conn, $sql);

            //To get individual data use a loop (while loop)
            //Convert the fetched data into an associative array (key/value)

            while($row = mysqli_fetch_assoc($fetched_results)){
                //for each record in the while grab the data in their respective columns
                extract($row);

                echo "
                 <tr>
                <td>$id</td>
                <td>$firstname</td>
                <td>$lastname</td>
                <td>$email</td>
                <td>
                
                
                
                <a href='update.php?user_id=$id&u_firstname=$firstname&u_lastname=$lastname&u_email=$email' class='btn-info'>Update</a>
                <a href='delete.php?user_id=$id' class='btn-danger'>Delete</a>
                
</td>
                
            </tr>
               
                ";
            }


            ?>


            </tbody>
        </table>

    </div>
<?php include 'footer.php'?>