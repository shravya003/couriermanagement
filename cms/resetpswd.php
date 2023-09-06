<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Conforming</title>
    <style>
        body
        {
        background-color:#E6E6FA;
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <h2 align='center' style="font-weight: bold;color:#9F2B68;font-family:'Times New Roman', Times, serif">The Fastest Courier Service Ever</h2>
    <div><h5 ><a href="index.php" style="float: right; margin-right:40px; color:#9F2B68; margin-top:0px">SignIn</a></h5></div>
        <div class="container" style="margin-top: 60px; width:50%;">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="color: #9F2B68;">Verify The Following Details</h4>
                    <p style="color:#e84118;">To Reset Your Password⮯⮯</p>
                    <form action="resetpswd.php" method="get">
                            
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter emailId" required>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="submit" value="Verify" style="background-color:#DDA0DD; border-radius: 10px; width: 100px; height: 40px;" />
  
                        </div>
                        <p style="color: #e84118;">Don't have an account?⮞➤ <a href="register.php">Register here</a>.</p>
                        
                    </form>
                </div>
            </div>
        </div>
</body>
</html>

<?php

require_once "dbconnection.php";
// require_once "session.php";

if (isset($_REQUEST['submit'])) {

    $email = $_REQUEST['email'];

    $qryy= "SELECT * FROM `login` WHERE `email`='$email'";
    $run= mysqli_query($dbcon,$qryy);
    $row= mysqli_num_rows($run);
    if($row<1){
        ?>
        <script>alert("Oops! Email does not match...Try again or Create New One");
            window.open('resetpswd.php','_self');
        </script>   <?php
    }
    else{
        $data= mysqli_fetch_assoc($run);
        $id=$data['u_id'];
        session_start();
        $_SESSION['gid']=$id;
        
        ?>  <script>
              
            window.open('reset.php','_self');
            </script>
        <?php
        

    }
}
    
?>