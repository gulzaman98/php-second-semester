<?php

include 'connection.php';

// INSERT

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

// Update

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    $update = mysqli_query($con , "UPDATE register 
    SET
    Name = '$name',
    Email = '$email',
    Password = '$password',
    Address = '$address',
    role = '$role'
    where id = '$id'
    ");

    if($update){
        echo "<script>
            alert('Data Updated Successfully');
            location.assign('fetch.php');
            </script>";
    }

}










// DELETE

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $delete = mysqli_query($con , "DELETE from register where id = '$id'");

    if($delete){

    echo "<script>
        alert('Data Deleted Successfully')
        location.assign('fetch.php')
    </script>";

    }
}

?>