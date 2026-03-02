<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        table{
            border-collapse: collapse;
            width: 60%;
        }
        th,td{
            border: 1px solid black;
            padding:8px;
            text-align:left;
        }

        th{
            background-color:#eee
        }
    </style>
</head>
<body>
    
<?php
// Array
// Single Dimensional Array
// Index Array

// $books = ['XML' , 'Adv JS' , 'MySql' , 'PHP' , 'Laravel' , 686];
// $books = array('XML' , 'Adv JS' , 'MySql' , 'PHP' , 'Laravel' , 686);

// // echo $books;
// // echo $books[3];

// // echo '<pre>';
// // var_dump($books);
// // print_r($books);
// // echo '</pre>';

// foreach($books as $value){
//     echo $value . '<br>';
// };

// Associative Array

// $students = ['name' => 'ali' , 'email'=>'ali@gmail.com' , 'age' => 27];
// // echo $students['name'] . $students['email'];

// foreach($students as $data){
//     echo $data . '<br>';
// };

// Multidimensional Array
// $cources = [
//     ['HTML' , 'CSS' , 'JS' , 'Bootstrap' , 'SEO'],
//     ['XML' , 'JSON' , 'AdvJS' , 'MySql' , 'PHP'],
//     ['SQL SERVER' , 'C#' , 'don net' , 'Angular' , 'Typescript'],

// ];

// echo $cources [1][4];
// foreach($cources as $value){
//     echo $value[0], '<br>';
//     echo $value[1], '<br>';
//     echo $value[2], '<br>';
//     echo $value[3], '<br>';
//     echo $value[4], '<br>';
// };

// foreach($cources as $value){
//     foreach($value as $data){
//         echo $data . '<br>';
//     }
// }


// Associative Array

$users = [
    ['id'=>123 , 'name'=>'Gulzaman' , 'email'=>'gul@gmail.com'],
    ['id'=>456 , 'name'=>'Saad' , 'email'=>'saad@gmail.com'],
    ['id'=>789 , 'name'=>'Hasnain' , 'email'=>'has@gmail.com'],
];

// echo $users[2]['id'] . '<br>' .  $users[1]['name'] 

// foreach($users as $value){
//     echo $value['id'], '<br>';
//     echo $value['name'], '<br>';
//     echo $value['email'], '<br>';
// };



?>
<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
    </tr>

    <?php foreach($users as $user){ ?>

    <tr>
        <td><?php echo $user['id'];?></td>
        <td><?php echo $user['name'];?></td>
        <td><?php echo $user['email'];?></td>
    </tr>
    <?php } ?>

</table>
</body>
</html>