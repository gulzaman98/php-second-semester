<?php

include 'connection.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    // echo $name . '<br>'  .$email . '<br>'  .$pass . '<br>'  .$address;  


    $insert  = mysqli_query($con , "INSERT INTO register(Name , Email , Password , Address , role)VALUES
    ('$name' , '$email' , '$pass' , '$address' , '$role')");

       if($insert){
       header('location: register.php');
       }
    

}

?>