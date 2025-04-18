<?php session_start(); 
if(!isset($_SESSION['id'])){
    header("Location: login.php"); // Redirect to login page if no username is set
}

if(isset($_POST['Submit'])){

    include('../connections/connections.php');
    $query = "INSERT INTO suggestions VALUES(".$_SESSION['id'].",'".$_POST['suggestion']."','".$_POST['link']."',NOW())";
    $res = mysqli_query($conn,$query);
    mysqli_close($conn);
    header("Location: teacherDashboard.php?id=".$_SESSION['id']); 
}

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
    <link rel="stylesheet" href="../css/login.css">
    <style>
        @import 'https://fonts.googleapis.com/css?family=Montserrat:300, 400, 700&display=swap';

        html {
	font-size: 10px;
	font-family: 'Montserrat', sans-serif;
	scroll-behavior: smooth;
}
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgb(226, 222, 222,0.2);
        }
        textarea{
            width: 300px;
            height: 100px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
        }
        form h1{
            color:white;
            letter-spacing:2px;
            border-bottom: 2px solid grey;
        }
        label{
            font-size: 20px;
            color: #f0e8e8;
            margin-top: 10px;
            display:inline-block;
        }
        select {
  appearance: none; /* Remove default arrow in some browsers */
  padding: 10px;
  color: white;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  background-color: transparent;
  width: 200px; /* Adjust as needed */
  cursor: pointer;
}

select:hover {
  border-color: #999;
}

select:focus {
  background-color: rgba(19, 19, 19, 0.8); /* Change background color on focus */
  outline: none; /* Remove default focus outline */
  border-color: #007bff; /* Add a custom focus style */
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

    </style>
</head>
<body>
<?php include '../connections/header.php'; ?>
    <div class = "container" >
        <div class = "submitForm ">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h1>Submit Suggestion</h1>
                <label for="suggestion">Suggestion:</label>
                <textarea id="suggestion" name="suggestion"></textarea>
                
                <label for="link">link:</label>
                <textarea id="link" name="link"></textarea><br><br>
                <input type="submit" value="Submit" name="Submit">
            </form>
        <div></div>
    </div>
</body>
</html>