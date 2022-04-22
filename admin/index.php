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
            <h1 class="banner-title">Dashboard</h1>
            <form action="" method="post">
                <div>
                    <select name="status_cars" class="option-btn">
                        <option>See Car Status</option>
                        <option value="Available">Available</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
        
        <?php 
        if(isset($_POST['submit'])){
            include '../includes/config.php';
            
            
			$selected_value = $_POST['status_cars'];				
							
            
            $qry = "SELECT * FROM cars WHERE status = '$selected_value'";
            $rsl = $conn->query($qry);
            $num = $rsl->num_rows;
            
            
            if($num > 0){            
        ?>
        
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
                
                while($rws = $rsl->fetch_assoc()){
            ?>
            
                <div class="img-container">
                    <img src="../cars/<?php echo $rws['image'];?>" alt="product" class="product-img">
                    <a href="vehicles.php">
                        <button class="bag-btn"><i class="fas fa-shopping-cart"></i>More Information</button>
                    </a>
                </div>
                <h3><?php echo $rws['car_name'];?></h3>
                
                <h4>Status: <?php echo $rws['status'];?></h4>
            
            <?php
                }
            }else{
                echo "<script type = \"text/javascript\"> 
                alert(\"No Out Of Stock Cars\");                          
                window.location = (\"client_messages.php\")
                </script>";
            }
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