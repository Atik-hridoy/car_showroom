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
            <h1 class="banner-title">Manage Cars</h1>
            <a href="add_cars.php">
                <button class="banner-btn">Add a New Car</button>
            </a>
        </div>
        
        
        
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Cars</h2>
        </div>
        <div class="products-center">
            
            <!-- single product -->
            <article class="product">
            <?php
            include '../includes/config.php';					            
            $qry = "SELECT * FROM cars";
            $rsl = $conn->query($qry);
                while($rws = $rsl->fetch_assoc()){
            ?>
            
                <div class="img-container">
                    <img src="../cars/<?php echo $rws['image'];?>" alt="product" class="product-img">
                    <a href="delete_car.php?id=<?php echo $rws['car_id'];?>">
                        <button class="bag-btn"><i class="fas fa-shopping-cart"></i>Delete</button>
                    </a>
                    <a href="edit_car.php?id=<?php echo $rws['car_id'];?>&name=<?php echo $rws['car_name'];?>">
                        <button class="bag-btn-two"><i class="fas fa-shopping-cart"></i>Update</button>
                    </a>
                </div>
                <h3><?php echo $rws['car_name'];?></h3>
                
                <h4>Status: <?php echo $rws['status'];?></h4>
            
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