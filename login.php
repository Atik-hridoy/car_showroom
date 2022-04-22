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
                <h1 class="banner-title">Admin Login</h1>
                <div>
                    <input type="text" name="uname" placeholder="Enter Username" required>
                </div>
                <br>
                <div>
                    <input type="password" name="pass" placeholder="Enter Password" required>
                </div>
                <br>
                <div>
                    <input type="submit" name="login" value="Login">
                </div>
            </form>
            
        </div>    
        <?php 
        if(isset($_POST['login'])){
            include 'includes/config.php';
            
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            
            $query = "SELECT * FROM admin WHERE uname = '$uname' AND pass = '$pass'";
            $rs = $conn->query($query);
            $num = $rs->num_rows;
            $rows = $rs->fetch_assoc();
            if($num > 0){
                session_start();
                $_SESSION['uname'] = $rows['uname'];
                $_SESSION['pass'] = $rows['pass'];
                echo "<script type = \"text/javascript\">                           
                            window.location = (\"admin/index.php\")
                            </script>";
            } else{
                echo "<script type = \"text/javascript\">                           
                            window.location = (\"login.php\")
                            </script>";
            }
        }?>
        
    </header>
    <!-- end of hero -->
    
    <script src="js/app.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>