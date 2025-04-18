<?php 

if(isset($_POST['signUp'])){
    include('../connections/connections.php');
    $username = $_POST['username']; 
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check if the user exists in the database
    $query = "SELECT * FROM students WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $mssg = "Username with Same password already exists. Please choose a different username or Password.";
    }else{
    $query = "INSERT INTO students VALUES(NULL,'$username', '$password','$email',NOW())";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: login.php"); 
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    }
} else{

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<p><?php if(isset($mssg)) echo $mssg; ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Sign Up</h1><hr>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Sign Up" name="signUp">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>