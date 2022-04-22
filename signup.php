<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarPod Showroom</title>
    <!-- font awesome -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>
    
    <!-- navbar -->
    <nav class="navbar">
        <?php include 'header.php'?>
    </nav>
    <!-- end of navbar -->
    
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <form method="post">
                <h1 class="banner-title">SignUp</h1>
                <div>
                    <input type="text" name="fname" placeholder="Enter First Name" required>
                </div>
                <br>
                <div>
                    <input type="text" name="phone" placeholder="Enter Phone" required>
                </div>
                <br>
                <div>
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                <br>
                <div>
                    <input type="password" name="id_no" placeholder="Enter Password" required>
                </div>
                <br>
                <div>
                    <input type="text" name="location" placeholder="Enter Location" required>
                </div>
                <br>
                <div>
                    <select name="gender" class="option-btn">
                        <option>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="save" value="Submit">
                </div>
            </form>
            
        </div>    
        <?php 
        if(isset($_POST['save'])){
            include 'includes/config.php';
            
            $fname = $_POST['fname'];
            $pass = $_POST['id_no'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $location = $_POST['location'];
							
            
            $qry = "SELECT * FROM client WHERE email = '$email'";
            $rsl = $conn->query($qry);
            $num = $rsl->num_rows;

            if($num > 0){
                echo "<script type = \"text/javascript\"> 
                            alert(\"Same Email Id Exists\");                          
                            window.location = (\"signup.php\")
                            </script>";
            }else{
                $query = "INSERT INTO client (fname,email,id_no,phone,location,gender,status)
                VALUES('$fname','$email','$pass','$phone','$location','$gender','Select a Car');";
                $result = $conn->query($query);
                
                if($result == TRUE){
                    session_start();
                    $_SESSION['email'] = $rows['email'];
                    $_SESSION['pass'] = $rows['id_no'];
                    $_SESSION['id'] = $rows['client_id'];
                    
                    echo "<script type = \"text/javascript\">                           
                                window.location = (\"account.php\")
                                </script>";
                } else{
                    echo "<script type = \"text/javascript\">                           
                                window.location = (\"signup.php\")
                                </script>";
                }
            }
            
            /////////////////////
            // $query = "INSERT INTO client (fname,email,id_no,phone,location,gender,status)
            // VALUES('$fname','$email','$pass','$phone','$location','$gender','Select a Car');";
            // $result = $conn->query($query);
            
            // if($result == TRUE){
            //     session_start();
            //     $_SESSION['email'] = $rows['email'];
            //     $_SESSION['pass'] = $rows['id_no'];
            //     $_SESSION['id'] = $rows['client_id'];
                
            //     echo "<script type = \"text/javascript\">                           
            //                 window.location = (\"account.php\")
            //                 </script>";
            // } else{
            //     echo "<script type = \"text/javascript\">                           
            //                 window.location = (\"signup.php\")
            //                 </script>";
            // }
        }?>
        
    </header>
    <!-- end of hero -->
    
    <script src="js/app.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>