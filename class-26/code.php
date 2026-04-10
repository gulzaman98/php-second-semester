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

        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_name'] = $data['Name'];

              echo "<script>
            alert('welcome to website')
            location.assign('index.php')
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
        if($cat_type == 'jpg' || $cat_type == 'png' || $cat_type == 'jpeg' || $cat_type == 'webp' || $cat_type == 'jfif'){
            
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
            echo "<script>alert('only allow JPG, PNG  JPEG aur WEBP');</script>";
        }
    } else {
        echo "<script>alert('File size less than 5MB ');</script>";
    }
}


// ADD Product

if(isset($_POST["add-pro"])){
    $p_name = $_POST['p_name']; 
    $p_descript = $_POST['p_description']; 
    $p_price = $_POST['p_price']; 
    $p_qnty = $_POST['p_qnty']; 
    $category_id = $_POST['category_id']; 

    $image_name = $_FILES['p_image']['name'];
    $image_size = $_FILES['p_image']['size'];
    $temp_name = $_FILES['p_image']['tmp_name'];
    $image_type = pathinfo($image_name, PATHINFO_EXTENSION);
    $destination = 'admin_panel/images/'.$image_name;

    if($image_size <= 5000000){

    if($image_type == 'jpg' || $image_type == 'png' || $image_type == 'jpeg' || $image_type == 'webp' || $image_type == 'jfif'){
        if(move_uploaded_file($temp_name , $destination)){

            $add_product = mysqli_query($con, "INSERT INTO add_product(p_name, p_description,
            p_price, p_qnty,  category_id, p_image) VALUES('$p_name', '$p_descript', '$p_price',
            '$p_qnty', '$category_id', '$image_name')");


            die(mysqli_error($con));



            if($add_product){
                  echo "<script>
            alert('product inserted successfully')
            location.assign('admin_panel/public.php?product')
            </script>"; 
            }




        }else{
           echo "<script>
            alert('file not inserted')
            location.assign('admin_panel/public.php?product')
            </script>"; 
        }


    }else{
        echo "<script>
            alert('file format not supported')
            location.assign('admin_panel/public.php?product')
            </script>";
    }



    }else{
        echo "<script>
            alert('file size too longer')
            location.assign('admin_panel/public.php?product')
            </script>";
    }
}


// DD TO Cart

if(isset($_POST['add-to-cart'])){
    $user_id = $_SESSION['user_id'];
    $p_id = $_POST['p_id'];
    $p_price = $_POST['p_price'];
    $p_qnty = $_POST['p_qnty'];

    $add_to_cart =  mysqli_query($con, "INSERT INTO add_to_cart(user_id, pro_id, pro_price, pro_qnty)
    VALUES('$user_id', '$p_id', '$p_price', '$p_qnty')");

    if($add_to_cart){
         echo "<script>
            alert('your data added in your cart syuccessfuly');
            window.location.href='product-detail.php?id=$p_id';
            </script>";      
    }
}

?>