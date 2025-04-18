<?php
if(isset($_POST['login'])){
    include('../connections/connections.php');
    $username = $_POST['username']; 
    $password = $_POST['password'];
    
    // Check if the user exists in the database
    if($_POST['user'] == 'student'){
    $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['username'] = $username;
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['user'] = $_POST['user']; 

        
        header("Location: index.php?username=".$_SESSION['username']."&id=".$_SESSION['id'].""); 
    } else {
        echo "Invalid username or password.";
    }
    
    mysqli_close($conn);
    } 
 if($_POST['user'] == 'teacher'){
    $query = "SELECT * FROM teachers WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['username'] = $username;
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['user'] = $_POST['user']; 

        // Redirect to a different page or perform other actions
        header("Location: teacherDashboard.php?username=".$_SESSION['username']."&id=".$_SESSION['id'].""); // Redirect to a welcome page
    } else {
        echo "Invalid username or password.";
    }
    
    mysqli_close($conn);
}}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Login</h1><hr>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="user">User Belongs To :    </label>
        <label for="user">teacher</label><input type="radio" id="user" name="user" value="teacher">
        <label for="user">student</label><input type = "radio" id="user" name="user" value="student" checked>
        <br><br>
        <input type="submit" value="Login" name="login">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
</body>
</html>