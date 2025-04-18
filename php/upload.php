<?php 
    session_start();
    include '../connections/connections.php';

    if(isset($_POST['upload']) && $_SESSION['user'] == 'student'){
        $project_name = $_POST['name'];
        $Project_description = $_POST['description'];
        $name = $_FILES['myfile']['name'];
        $location = $_FILES['myfile']['tmp_name'];
        $query = "INSERT INTO student_projects VALUES ('".$_SESSION['id']."', '".$_POST['name']."', '".$_POST['description']."', '".$name."', NOW())";
        $result = mysqli_query($conn,$query);
        if(move_uploaded_file($location,"uploads/".$name)){
            header("Location: ../index2.php");
        }}
    elseif(isset($_POST['upload']) && $_SESSION['user'] == 'teacher'){
            $project_name = $_POST['name'];
            $Project_description = $_POST['description'];
            $name = $_FILES['myfile']['name'];
            $location = $_FILES['myfile']['tmp_name'];
            $query = "INSERT INTO teacher_projects VALUES ('".$_SESSION['id']."', '".$_POST['name']."', '".$_POST['description']."', '".$name."', NOW())";
            $result = mysqli_query($conn,$query);
            if(move_uploaded_file($location,"uploads/".$name)){
                header("Location: ../index2.php");
            }}
    else{
            
        }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel = "stylesheet" href="../css/login.css">
    <link rel = "stylesheet" href="../css/upload.css">
    <style>
        .form h1{
            text-align: center;
        }
    </style>
</head>
<body>
        <div class="form">
        <form class = "form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
            <h1>Project</h1>
            <hr>
                <label>Project Name :</label>
                <input type="text" name="name" required>
                <label>Project description :</label>
                <input type="text" name="description" required>
                <input type="file" name="myfile" value="<?php if(isset($name)){echo $name;} ?>" required>
                <input type="submit" name="upload">
            </form>
        </div>
</body>
</html>