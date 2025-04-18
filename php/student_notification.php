<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php"); // Redirect to login page if no username is set
}
include('../connections/connections.php');
$query = "SELECT * FROM teacher_text WHERE student_id='".$_SESSION['id']."' order by date desc";
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
        table {
            color : black;
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
            <th>From</th>
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
    echo $ans['date']; 
    ?></td></tr>
            <?php } ?>
        
    </table>
</body>
</html>