<?php

include 'connection.php';

// INSERT

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    $query = mysqli_query($con , 'SELECT Email from register where Email = "$email"');
    echo mysqli_num_rows($query);


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


// login from

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $query = mysqli_query($con , "SELECT * from register where Email = '$email' AND Password = '$pass' ");
    if(mysqli_num_rows($query) == 1){
        $data = mysqli_fetch_assoc($query);

        if($data['role'] == 'admin'){
            echo "<script>
            alert('welcome to admin panel')
            location.assign('admin_panel/public.php?index')
            </script>";
        }else{
              echo "<script>
            alert('welcome to website')
            location.assign('user.php')
            </script>";
        }
    }else{
          echo "<script>
            alert('incorect email id or password')
            location.assign('login.php')
            </script>";
    }
}

?>