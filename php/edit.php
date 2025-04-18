<?php 
session_start();


if($_SESSION['user'] == 'student'){   
if(isset($_POST['submit'])){
    include('../connections/connections.php');
    $query = "SELECT * FROM about WHERE student_id='".$_SESSION['id']."'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $query = "UPDATE about SET name='".$_POST['name']."', department='".$_POST['department']."', college='".$_POST['college']."', insta_id='".$_POST['insta_id']."', twitter_id='".$_POST['twitter_id']."', github_id='".$_POST['github_id']."', linked_in='".$_POST['linked_in']."', whatsapp_no='".$_POST['whatsapp_no']."', phone_no='".$_POST['phone_no']."', email='".$_POST['email']."', address='".$_POST['address']."', about='".$_POST['about']."' WHERE student_id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>alert('Information Updated Successfully');</script>"; 
            header("Location: ../index2.php"); // Redirect to login page if no username is set
        }else {
            echo "<script>alert('Error Updating Information');</script>";
        }
    }
    else{
        if(isset($_POST['name'])&& isset($_POST['about'])){
        $query = "INSERT INTO about VALUES ('".$_SESSION['id']."', '".$_POST['name']."', '".$_POST['department']."', '".$_POST['college']."', '".$_POST['insta_id']."', '".$_POST['twitter_id']."', '".$_POST['github_id']."', '".$_POST['linked_in']."', '".$_POST['whatsapp_no']."', '".$_POST['phone_no']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['about']."', '".$_POST['flag']."')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>alert('Information Inserted Successfully');</script>";
            header("Location: ../index2.php"); // Redirect to login page if no username is set
        }else {
            echo "<script>alert('Error Inserting Information');</script>";
        }}
        else{
            
        }
    }
}}
else{
    if(isset($_POST['submit'])){
        include('../connections/connections.php');
        $query = "SELECT * FROM about_teacher WHERE teacher_id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $query = "UPDATE about_teacher SET name='".$_POST['name']."', department='".$_POST['department']."', college='".$_POST['college']."', insta_id='".$_POST['insta_id']."', twitter_id='".$_POST['twitter_id']."', github_id='".$_POST['github_id']."', linked_in='".$_POST['linked_in']."', whatsapp_no='".$_POST['whatsapp_no']."', phone_no='".$_POST['phone_no']."', email='".$_POST['email']."', address='".$_POST['address']."', about='".$_POST['about']."' WHERE teacher_id='".$_SESSION['id']."'";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>alert('Information Updated Successfully');</script>"; 
                header("Location: ../index2.php"); // Redirect to login page if no username is set
            }else {
                echo "<script>alert('Error Updating Information');</script>";
            }
        }
        else{
            $query = "INSERT INTO about_teacher VALUES ('".$_SESSION['id']."', '".$_POST['name']."', '".$_POST['department']."', '".$_POST['college']."', '".$_POST['insta_id']."', '".$_POST['twitter_id']."', '".$_POST['github_id']."', '".$_POST['linked_in']."', '".$_POST['whatsapp_no']."', '".$_POST['phone_no']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['about']."', '".$_POST['flag']."')";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "<script>alert('Information Inserted Successfully');</script>";
                header("Location: ../index2.php"); // Redirect to login page if no username is set
            }else {
                echo "<script>alert('Error Inserting Information');</script>";
            }
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f2f0, #e0e0e0);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('../img/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    object-fit: cover;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 700px;
            background-image: url('../img/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    object-fit: cover;
            
        }
        form{
            background-color: rgba(216, 210, 210, 0.2);
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
            color: white;

        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        .form-group {
            margin-bottom: 20px; /* Reduced margin for tighter layout */
            display: flex; /* Enable flexbox for label and input alignment */
            align-items: center; /* Vertically align label and input */
        }

        label {
            display: inline-block;
            width: 150px; /* Adjust width as needed */
            margin-right: 15px;
            color: white;
            background-color: rgb(11, 11, 11,0.8);
            padding: 10px;
            text-align: center;
            border-radius: 6px;
            letter-spacing: 2px;/* Align label text to the right */
        }
        h1{
            color: white;
        }

        input[type="number"],
        input[type="text"],
        input[type="email"],
        textarea {
            flex-grow: 1; /* Allow input to take remaining space */
            padding: 12px;
            border: 1px solid white;
            border-radius: 6px;
            box-sizing: border-box;
            font-weight: light;
            color: #333;

            transition: border-color 0.3s ease;
            background: white;
        }

        input:focus {
            border-color: #3498db;
            outline: none;
            color: black;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.5);
        }

        textarea {
            resize: vertical;
            /* Slightly reduced for tighter layout */
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px; /* Reduced margin */
            justify-content: flex-end; /* Push checkbox to the right */
        }

        .checkbox-group input[type="checkbox"] {
            margin-left: 15px;
            width: 20px;
            height: 20px;
        }

        .checkbox-group label {
            font-weight: normal;
            text-align: left;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 14px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: block; /* Make button take full width */
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        button[type="submit"]:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .readonly-input {
            background-color: #f0f0f0;
            color: #777;
            cursor: not-allowed;
        }

        .form-group small {
            color: #777;
            font-size: 0.9em;
            display: block;
            margin-top: 5px;
            text-align: right; /* Align small text to the right */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Student Information</h1>
        <?php 
        include('../connections/connections.php');
        if($_SESSION['user'] == 'student'){
        $query = "SELECT * FROM about WHERE student_id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_POST['name'] = $row['name'];
            $_POST['department'] = $row['department'];
            $_POST['college'] = $row['college'];
            $_POST['insta_id'] = $row['insta_id'];
            $_POST['github_id'] = $row['github_id'];
            $_POST['linked_in'] = $row['linked_in'];
            $_POST['whatsapp_no'] = $row['whatsapp_no'];
            $_POST['phone_no'] = $row['phone_no'];
            $_POST['email'] = $row['email'];
            $_POST['address'] = $row['address'];
            $_POST['about'] = $row['about'];
        }}else{
        $query = "SELECT * FROM about_teacher WHERE teacher_id='".$_SESSION['id']."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_POST['name'] = $row['name'];
            $_POST['department'] = $row['department'];
            $_POST['college'] = $row['college'];
            $_POST['insta_id'] = $row['insta_id'];
            $_POST['github_id'] = $row['github_id'];
            $_POST['linked_in'] = $row['linked_in'];
            $_POST['whatsapp_no'] = $row['whatsapp_no'];
            $_POST['phone_no'] = $row['phone_no'];
            $_POST['email'] = $row['email'];
            $_POST['address'] = $row['address'];
            $_POST['about'] = $row['about'];
        }
    }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            

            <div class="form-group">
                <label for="name">Name </label>
                <input type="text" id="name" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="department">Department </label>
                <input type="text" id="department" name="department"  value="<?php if(isset($_POST['department'])) echo $_POST['department']; ?>" >
            </div>

            <div class="form-group">
                <label for="college">College </label>
                <input type="text" id="college" name="college"  value="<?php if(isset($_POST['college'])) echo $_POST['college']; ?>" >
            </div>

            <div class="form-group">
                <label for="insta_id">Instagram ID </label>
                <input type="text" id="insta_id" name="insta_id" value="<?php if(isset($_POST['insta_id'])) echo $_POST['insta_id']; ?>" >
            </div>

            <div class="form-group">
                <label for="twitter_id">Twitter ID </label>
                <input type="text" id="twitter_id" name="twitter_id" value="<?php if(isset($_POST['twitter_id'])) echo $_POST['twitter_id']; ?>" >
            </div>

            <div class="form-group">
                <label for="github_id">GitHub Link </label>
                <input type="text" id="github_id" name="github_id"  value="<?php if(isset($_POST['github_id'])) echo $_POST['github_id']; ?>" >
            </div>

            <div class="form-group">
                <label for="linked_in">LinkedIn Profile </label>
                <input type="text" id="linked_in" name="linked_in" value="<?php if(isset($_POST['linked_in'])) echo $_POST['linked_in']; ?>" >
            </div>

            <div class="form-group">
                <label for="whatsapp_no">WhatsApp Number </label>
                <input type="number" id="whatsapp_no" name="whatsapp_no" value="<?php if(isset($_POST['whatsapp_no'])) echo $_POST['whatsapp_no']; ?>" >
            </div>

            <div class="form-group">
                <label for="phone_no">Phone Number </label>
                <input type="number" id="phone_no" name="phone_no" value="<?php if(isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>" >
            </div>

            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" id="email" name="email"    value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" >
            </div>

            <div class="form-group">
                <label for="address">Address </label>
                <input type="text" id="address" name="address"  value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>" >
            </div>

            <div class="form-group">
                <label for="about">About </label>
                <input type="text" id="about" name="about"  value = "<?php if(isset($_POST['about'])) echo $_POST['about']; ?>"  required>
            </div>

            <div class="form-group">
                <label for="datetime">Date/Time - Auto Generated</label>
                <input type="text" id="datetime" name="datetime" value="Will be auto-generated" readonly class="readonly-input">
            </div>

            <div class="checkbox-group">
                <label for="flag">I Here By Agreed <small>( Don't Worry ! We Protect your Data )</small></label>
                <input type="checkbox" id="flag" name="flag" value="1" checked required>    
            </div>

            <button type="submit" name="submit" >update Information</button>
        </form>
    </div>
</body>
</html>