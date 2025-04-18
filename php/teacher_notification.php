<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php"); // Redirect to login page if no username is set
}
include('../connections/connections.php');
$query = "SELECT * FROM student_text WHERE teacher_id='".$_SESSION['id']."' order by date desc";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <h1>Notifications</h1><br><br>
    <table>
        <tr>
            <th>From</th>
            <th>Message</th>
            <th>Send Message</th>
            <th>date</th>
        </tr>
        
            <?php while( $ans = mysqli_fetch_assoc($result)){?>
<tr><td><?php 
    $query = " SELECT username FROM students WHERE id='".$ans['student_id']."'";
    $result1 = mysqli_query($conn, $query);
    $result1 = mysqli_fetch_assoc($result1); // Fetch the result as an associative array
    echo $result1['username']; // Fetch the result as an associative array
    ?></td>
<td><?php echo $ans['text'];?></td>
<td><a href="<?php echo "submitFeedback.php?id=".$ans['student_id']."" ?>"><i class="fa-solid fa-comments"></i></a></td>
<td><?php 
    echo $ans['date'];
    ?></td></tr>
            <?php } ?>
        
    </table>
</body>
</html>