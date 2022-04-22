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
                <h1 class="banner-title">Contact Us</h1>
                <div>
                    <textarea class="message" name="message" placeholder="Enter Your Message" ></textarea>
                </div>
                <br>
                
                <div>
                    <input type="submit" name="send" value="Send Message">
                </div>
            </form>
        </div>     
           
        <?php 
        if(isset($_POST['send'])){
            include 'includes/config.php';
            
            $message = $_POST['message'];
            
            $query = "INSERT INTO message (message,client_id,time,status)
				VALUES('$message','$_SESSION[id]',NOW(),'Unread')";
            $result = $conn->query($query);
            
            if($result == TRUE){
                echo "<script type = \"text/javascript\">                       
                        window.location = (\"success.php\")
                        </script>";
                
            } else{
                echo "<script type = \"text/javascript\">   
                        alert(\"Message Not Sent\");                     
                        window.location = (\"message_admin.php\")
                        </script>";
            }
        }?>
        
    </header>
    <!-- end of hero -->
    
    <script src="js/app.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>