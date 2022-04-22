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
    
    <?php
    include 'includes/config.php';
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $query = "SELECT * FROM client WHERE email = '$_SESSION[email]' AND id_no = '$_SESSION[pass]'";
    $result = $conn->query($query);
    $rows = $result->fetch_assoc();
    ?>
    
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            
            <h1 class="banner-title"><?php echo $rows['fname'];?>'s Status</h1><br>
            <h1 class="banner-title"><?php echo $rows['status'];?></h1>
        </div>     
           
        
        
    </header>
    <!-- end of hero -->
    
    <script src="js/app.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>