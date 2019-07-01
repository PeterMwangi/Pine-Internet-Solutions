<?php
#create a database connection
$conn = mysqli_connect('localhost','root','','Registration');
# check connection is working
if(!$conn){
    #First handle a situation where an error can occur due to unsuccessful connection
    #mysqli_connect_error(): is a function that stores/contains the error msg for unsuccessful
    #connection
    die("Connection failed".mysqli_connect_error());
}

//else{
//  #when connection is successful, we can proceed to Create,Read,Update.Delete(CRUD)
// echo "Connection to the db successful";
//}




?>