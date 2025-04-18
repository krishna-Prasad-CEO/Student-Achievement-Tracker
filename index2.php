 <?php
session_start();
include('connections/connections.php');
if(isset($_GET['iid'])){
    $query = "SELECT * FROM about WHERE student_id=".$_GET['iid']."";
    $result = mysqli_query($conn, $query); 
    $ans = "";
    if(mysqli_num_rows($result) > 0){
        $ans = mysqli_fetch_assoc($result);
        $msg = $ans['name'];
        $_SESSION['error'] = "";
    } else {
        echo "<script>alert('The Selected Student, Yet not filled his/her Personal information');</script>";
        $_SESSION['error'] = "The Selected Student, Yet not filled his/her Personal information";
        header("Location: php/viewstudents.php"); 
    }}
elseif($_SESSION['user'] == 'student' ){
$query = "SELECT * FROM about WHERE student_id='".$_SESSION['id']."'";
$result = mysqli_query($conn, $query); 
$ans = "";
if(mysqli_num_rows($result) > 0){
    $ans = mysqli_fetch_assoc($result);
    $msg = $ans['name'];
} else {
    header("Location: php/edit.php");
    
}}else{
$query = "SELECT * FROM about_teacher WHERE teacher_id='".$_SESSION['id']."'";
$result = mysqli_query($conn, $query); 
$ans = "";
$msg = " ";
if(mysqli_num_rows($result) > 0){
    $ans = mysqli_fetch_assoc($result);
    $msg = $ans['name'];
} else {
    header("Location: php/edit.php"); // Redirect to login page if no username is set
}


}

$user = "";

if($_SESSION['user'] == 'student'){
     $user = 'php/index.php';
} else {
     $user = 'php/teacherDashboard.php';
}



?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!--header-->

    <header>
        <div class="mainNav">
            <div class="logo"><span class="unique">P</span>ort <span class="unique">F</span>olio</div>
            <ul>
                <li><a href = "php/upload.php" ><i class="fa-solid fa-file"></i> Upload</a></li>
                <li><a href = "#"><i class="fa-solid fa-user"></i> project</a></li>
                <li><a href = "#"><i class="fa-solid fa-envelope"></i> Contact</a></li>
                <li><a href="php/logout.php"><i class="fa-solid fa-cog"></i> LogOut</a></li>
            </ul>
        </div>
    </header>

    <!--mainArea-->

    <section id="main">

    <!--intro-->
       
        <div class="intro">
            <div class="bg1">
            <h1><i class="fa-regular fa-file-code" style="font-size: 2em;"></i>Welcome to My <span>Portfolio</span> </h1>
            <p>Hi, I'm <span><?php echo $msg?></span> <?php echo $ans['about']; ?></p>
            <p>Explore my work and projects below.</p>
            </div>
        </div>
        <div class="intro2">
            
        </div>

    </section>


    <!--project-->
    
    <div class="projects" id="project">
        <?php 
        
            include 'connections/connections.php';
            if(isset($_GET['iid'])){
                    $query1 = "SELECT * FROM student_projects WHERE student_id =". $_GET['iid']."";
            }
            elseif($_SESSION['user'] == 'student'){
                $query1 = "SELECT * FROM student_projects WHERE student_id =". $_SESSION['id']."";
            }
            else{                
                $query1 = "SELECT * FROM teacher_projects WHERE teacher_id =". $_SESSION['id']."";                
            }
            $rese = mysqli_query($conn,$query1);

            if(mysqli_num_rows($rese) > 0){
            while($res = mysqli_fetch_assoc($rese)){
        
        ?>
        <div class="project">
            <h2><?php if(isset($res['name'])){echo "Name : ".$res['name'];} ?><i class="fa-solid fa-file"></i></h2>
            <p><?php if(isset($res['description'])){echo "Description : ". $res['description'];} ?></p>
            <div class="btn"><a download = "<?php echo $res['location']; ?>" name = "download" href="php/uploads/<?php echo $res['location']; ?>" >Download</a></div>
        </div>
        <?php }}?>
        
    </div>

    <!--contact-->
    <div class="contact" >
        <h2>Contact Me</h2>
        
        <form action="#" id="contact2">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
        <div class="socials">
            <a href="https://github.com/<?php echo $ans['github_id']; ?>" target = "_blank"><i class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/in/<?php echo $ans['linked_in']; ?>" target = "_blank"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://twitter.com/<?php echo $ans['twitter_id']; ?>" target = "_blank"><i class="fa-brands fa-twitter"></i></a>
            <a href="http://instagram.com/<?php echo $ans['insta_id']; ?>" target = "_blank"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>
    <script>document.addEventListener('DOMContentLoaded', function() {
  const links = document.querySelectorAll('li a');

  links.forEach(link => {
    if (link.textContent.trim().toLowerCase() === 'project') {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        alert('Scroll to View...');
      });
    } else if (link.textContent.trim().toLowerCase() === 'contact') {
      link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        alert('Scroll to view...');
      });
    }
  });
});</script>
</body>
</html>