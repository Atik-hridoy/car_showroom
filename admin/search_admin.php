<?php include '../includes/config.php';?>
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
            <h1 class="banner-title">Search Page</h1>
            <a href="client_requests.php">
                <button class="banner-btn">See Requests</button>
            </a>
        </div>
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <?php
                
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $query = "SELECT * FROM cars WHERE car_name LIKE '%$search%' OR car_type LIKE '%$search%' OR hire_cost LIKE '%$search%' OR year LIKE '%$search%' OR color LIKE '%$search%'";
            
            $rs = $conn->query($query);
            $num = $rs->num_rows;
        ?>
        
            
        <div class="section-title">
            <h2><?php echo $num?> Results Found for <?php echo $search?></h2>
        </div>
        <?php    
            if($num > 0){
                while($rws = $rs->fetch_assoc()){
                                    
        ?>
        <div class="products-center">
            
            <!-- single product -->
            <article class="product">
            
            
                <div class="img-container">
                    <img src="../cars/<?php echo $rws['image'];?>" alt="product" class="product-img">
                    <a href="edit_car.php?id=<?php echo $rws['car_id'];?>&name=<?php echo $rws['car_name '];?>">
                        <button class="bag-btn"><i class="fas fa-shopping-cart"></i>Update</button>
                    </a>
                </div>
                <h3>Model: <?php echo $rws['car_name'];?></h3>
                <h3>Manufacturer: <?php echo $rws['car_type'];?></h3>
                <h3>Year: <?php echo $rws['year'];?></h3>
                <h3>Color: <?php echo $rws['color'];?></h3>
                <h4>$<?php echo $rws['hire_cost'];?></h4>
            
            <?php
                }
            }else{
                echo "<h3 style='text-align: center; color: #f09d51;'>No Result!</h3>";
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