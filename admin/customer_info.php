<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarPod Admin</title>
    <!-- font awesome -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/reset.css">
</head>
<body>
    
    <!-- navbar -->
    <nav class="navbar">
        <?php include 'menu.php'?>
    </nav>
    <!-- end of navbar -->
    
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">Customer Info Desk</h1>
            <a href="client_requests.php">
                <button class="banner-btn">See Requests</button>
            </a>
        </div>
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Customers</h2>
        </div>
        <div class="products-center">
            
            <!-- single product -->
            <article class="product">
            <?php
                include '../includes/config.php';
                $query = "SELECT * FROM client";
                $rs = $conn->query($query);
                while($rws = $rs->fetch_assoc()){
            ?>
            
                
                <h4>Customer ID: <?php echo $rws['client_id'];?></h4>
                <h3>Name: <?php echo $rws['fname'];?></h3>
                <h3>email: <?php echo $rws['email'];?></h3>
                <h3>phone: <?php echo $rws['phone'];?></h3>
                <h3>location: <?php echo $rws['location'];?></h3>
                <h3>gender: <?php echo $rws['gender'];?></h3>
                <h3>Ordered Car ID: <?php echo $rws['car_id'];?></h3>
                <h3>Status: <?php echo $rws['status'];?></h3><br>
            
            <?php
                }
            ?>
            </article>
            <!-- end of single product -->
            
        </div>
    </section>
    <!-- end of products -->
    
    <script src="../js/app.js"></script>
    <script src="../js/jquery.js"></script>
</body>
</html>