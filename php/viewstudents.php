<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php"); // Redirect to login page if no username is set
}
include('../connections/connections.php');
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../index2.css">
    <link rel="stylesheet" href="../css/index.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        table {
            color : black;
        }
        table tr td:nth-child(3){
            text-align: center;
        }
        .btn2{
    width:180px;
    line-height: 50px;
    font-weight: bolder;
    color:white;
    border-radius: 5px;
    letter-spacing: 2px;
    text-align: center;
    background-color:crimson;
    padding: 10px 20px;
    transition: all 0.5s ease-in;
    overflow: hidden;
    border: 0.5px solid white;
    margin-right: 20px;
    animation: border1 4s ease-in infinite;
}

.btn2 a{
    transition: all 0.5s ease-in;
}
.btn2:hover a{
    color:white;
}
.btn2:hover{
    background-color: crimson;
    color: white;
    transform: scale(1.1);
}
p{
    text-align: center;
}
th,td{
            text-align:center;
            font-size: 20px;
        }

    </style>

</head>
<body>
    
    <h1>Notifications</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>about</th>
            <th>view</th>
        </tr>
        
            <?php while( $ans = mysqli_fetch_assoc($result)){?>
<tr><td><?php 
    echo $ans['username']; // Fetch the result as an associative array
    ?></td>
<td><?php 
 
 $query = " SELECT about FROM about WHERE student_id='".$ans['id']."'";
    $result1 = mysqli_query($conn, $query);
    $result1 = mysqli_fetch_assoc($result1); // Fetch the result as an associative array
    if(isset($result1['about'])){echo $result1['about']; } // Fetch the result as an associative array
?></td>
<td><?php 
    echo "<a class = 'btn2' href='../index2.php?iid=".$ans['id']."&user=".'student'."'>View</a>";
    ?></td></tr>
            <?php } ?>
        
    </table>
</body>
</html>