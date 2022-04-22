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
                <h1 class="banner-title">Make Payments</h1>
                <div>
                    <input type="text" name="mpesa" placeholder="Credit Card Number" required>
                </div>
                <br>
                <div>
                    <input type="password" name="pass" placeholder="Enter Password" required>
                </div>
                <br>
                <div>
                    <input type="submit" name="pay" value="Pay">
                </div>
            </form>
        </div>     
           
        <?php 
        session_start();
        if(isset($_POST['pay'])){
            include 'includes/config.php';
            
            $mpesa = $_POST['mpesa'];
            $pass = $_POST['pass'];
            
            // $query = "UPDATE client SET status = 'Pending' WHERE id_no = '$pass'";
            $query = "SELECT * FROM client WHERE status = 'Select a Car' OR status = 'Approved' AND client_id = '$_SESSION[id]'";
            $result = $conn->query($query);
            $num = $result->num_rows;
            $rows = $result->fetch_assoc();
            
            if($num > 0){
                $qry = "UPDATE client SET status = 'Pending', mpesa = '$mpesa', car_id = '$_GET[id]' WHERE client_id = '$_SESSION[id]'";
                $rs = $conn->query($qry);
                
                if($rs == TRUE){
                    echo "<script type = \"text/javascript\">                                                    
                            window.location = (\"wait.php\")
                            </script>";
                }else{
                    echo "<script type = \"text/javascript\">                                                    
                            window.location = (\"pay.php\")
                            </script>";
                }
                
            } else{
                echo "<script type = \"text/javascript\">   
                        alert(\"Get Approved for the previous Pay First\");                     
                        window.location = (\"index.php\")
                        </script>";
            }
        }?>
        
    </header>
    <!-- end of hero -->
    
    <script src="js/app.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>