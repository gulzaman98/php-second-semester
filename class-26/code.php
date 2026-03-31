<?php
session_start();
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
            alert('Category updated successfully!');
            window.location.href='admin_panel/public.php?category';
        </script>";
    }

}










// DELETE

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $delete = mysqli_query($con , "DELETE from register where id = '$id'");

    if($delete){

    echo "<script>
            alert('Category deleted successfully!');
            window.location.href='admin_panel/public.php?category';
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

        $_SESSION['admin_id'] = $data['id'];
        $_SESSION['admin_name'] = $data['Name'];

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

// ADD category




if(isset($_POST['add_cat'])){
    $cat_name = $_POST['cat_name'];

    $image_name = $_FILES['cat_image']['name'];
    $tmp_name = $_FILES['cat_image']['tmp_name'];
    $cat_size = $_FILES['cat_image']['size'];
    $cat_type = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    // Image save karne ka rasta
    $destination = "admin_panel/images/" . $image_name;

    if($cat_size <= 5000000){
        if($cat_type == 'jpg' || $cat_type == 'png' || $cat_type == 'jpeg'){
            
            if(move_uploaded_file($tmp_name, $destination)){
                // Table columns: category_name, category_image
                $query = "INSERT INTO add_category (category_name, category_image) VALUES ('$cat_name', '$image_name')";
                $add_cat = mysqli_query($con, $query);

                if($add_cat){
                    echo "<script>
                        alert('Category inserted successfully');
                        window.location.href='admin_panel/public.php?category';
                    </script>";
                }
            } else {
                echo "<script>alert('Image upload failed');</script>";
            }
        } else {
            echo "<script>alert('Sirf JPG, PNG aur JPEG allow hain');</script>";
        }
    } else {
        echo "<script>alert('File size 5MB se kam honi chahiye');</script>";
    }
}



?>