<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">toihocbtec</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['dateofbirth'];
                $res_id = $result['Id'];
                $res_create = $result['create_at'];

                //birthday
                $birthday = new DateTime($res_Age);
                $current_date = new DateTime();
                $interval = $current_date->diff($birthday);
                $years = $interval->format("%Y");
                $months = $interval->format("%m");
                $days = $interval->format("%d");

                //create_at
                $createdDate = new DateTime($res_create);
                $currentDate = new DateTime();
                $interval = $currentDate->diff($createdDate);
                $daysSinceCreation = $interval->format("%d");
                $yearsSinceCreation = $interval->format("%Y");
                $monthsSinceCreation = $interval->format("%m");
               
            }
        
            
            echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
            <div class="box">
                <!-- <p>You have been a member for <b><?php echo $res_Uname ?></b></p> -->
                <p>You are member for: <b><?php echo $yearsSinceCreation ?> years <b><?php echo $monthsSinceCreation ?> month <b> <?php echo $daysSinceCreation ?> day!!</p> 
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>And you are <b><?php echo $years ?> years old <b><?php echo $months ?> month <b> <?php echo $days ?> day!!</p> 
            </div>
            
          </div>
       </div>

    </main>
</body>
</html>