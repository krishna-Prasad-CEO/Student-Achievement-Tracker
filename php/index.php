<?php session_start(); 


if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
    include('../connections/connections.php');
    $query = "SELECT * FROM students WHERE id='".$_GET['id']."'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result); // Fetch the result as an associative array
    $msg = "Welcome ".$result['username']."!"; // Welcome message
} else {
    //header("Location: login.php"); // Redirect to login page if no username is set
}
$query = "SELECT * FROM student_text WHERE student_id='".$_SESSION['id']."' order by date desc";
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

.container {
    width: 100%;
    height: 40vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgb(226, 222, 222,0.2);
    
}
h1{
    margin-left: 20px;
    color: #f0e8e8;
    font-size: 30px;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
}
.btn1{
    width:180px;
    line-height: 50px;
    font-weight: bolder;
    color:white;
    border-radius: 5px;
    letter-spacing: 2px;
    text-align: center;
    background-color: rgba(141, 137, 137, 0.50);
    padding: 10px 20px;
    transition: all 0.5s ease-in;
    overflow: hidden;
    border: 0.5px solid white;
    margin-right: 20px;
    animation: border1 4s ease-in infinite;
}
.btn1:hover{
    background-color: crimson;
    color: white;
    transform: scale(1.1);
}
table tr {
    color:black;
}
th,td{
            text-align:center;
            font-size: 20px;
        }



    </style>
</head>
<body>
    <?php include '../connections/header.php'; ?>
<div class = "container">
    <h1><?php echo $msg; ?> </h1>
    <div class = "btns">
    <div class = "btn1" > <a href = "submitAchiement.php">Submit Achiement</a></div>
    <div class = "btn1" > <a href = "student_notification.php">Notifications</a></div>
</div></div>
    <h1>History</h1>
    <table >
        <tr>
            <th>To</th>
            <th>Message</th>
            <th>date</th>
        </tr>
        
            <?php while( $ans = mysqli_fetch_assoc($result)){?>
<tr><td><?php 
    $query = " SELECT username FROM teachers WHERE id='".$ans['teacher_id']."'";
    $result1 = mysqli_query($conn, $query);
    $result1 = mysqli_fetch_assoc($result1); // Fetch the result as an associative array
    echo $result1['username']; // Fetch the result as an associative array
    ?></td>
<td><?php echo $ans['text'];?></td>
<td><?php 
    echo $ans['date']; // Fetch the result as an associative array
    ?></td></tr>
            <?php } ?>
        
    </table>

</body>
</html>