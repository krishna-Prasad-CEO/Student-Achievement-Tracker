<?php session_start(); 
if(!isset($_SESSION['id'])){
    header("Location: login.php"); // Redirect to login page if no username is set
}

if(isset($_GET['id'])){
    include('../connections/connections.php');
    $query = "SELECT * FROM teachers WHERE id='".$_GET['id']."'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result); // Fetch the result as an associative array
    $msg = "Welcome ".$result['username']."!"; // Welcome message
} else {
    header("Location: login.php"); 
}
$query = "SELECT * FROM teacher_text WHERE teacher_id='".$_SESSION['id']."' order by date desc";
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

table tr {
    color:black;
}
th,td{
            text-align:center;
            font-size: 20px;
        }
.container .btns{
    background-color: transparent;
}
.container .btns div:nth-child(3),.container .btns div:nth-child(3) a{
    color: white;
    background-color: crimson;
}
.container .btns div:nth-child(4),.container .btns div:nth-child(4) a{
    color: white;
    background-color: crimson;
}





    </style>
</head>
<body>
    <?php include '../connections/header.php'; ?>
    <div class="container">
    <h1><?php echo $msg; ?> </h1>
    <div class="btns">
    <div class = "btn1" > <a href = "submitFeedback.php">Submit Feedback</a></div>
    <div class = "btn1" > <a href = "teacher_notification.php">Notifications</a></div>
    <div class = "btn1" > <a href = "viewstudents.php">View Students</a></div>
    <div class = "btn1" > <a href = "submitsuggestion.php">Submit Suggestion</a></div>
</div></div>
    <h1>History</h1>
    <table>
        <tr>
            <th>To</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        
            <?php while( $ans = mysqli_fetch_assoc($result)){?>
<tr><td><?php 
    $query = " SELECT username FROM students WHERE id='".$ans['student_id']."'";
    $result1 = mysqli_query($conn, $query);
    $result1 = mysqli_fetch_assoc($result1); // Fetch the result as an associative array
    echo $result1['username']; // Fetch the result as an associative array
    ?></td>
<td><?php echo $ans['text'];?></td>
<td><?php echo $ans['date'];?></td></tr>
            <?php } ?>
        
    </table>

</body>
</html>