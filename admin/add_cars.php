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
        <?php
        include 'menu.php'
        ?>
    </nav>
    <!-- end of navbar -->
    
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <form method="post" enctype="multipart/form-data">
                <h1 class="banner-title">Add New Car</h1>
                <div>
                    <input type="text" name="car_name" placeholder="Car Name" required>
                </div>
                <br>
                <div>
                    <input type="text" name="car_type" placeholder="Manufacturer" required>
                </div>
                <br>
                <div>
                   <h3>Image</h3> <input type="file" name="image" required>
                </div>
                <br>
                <div>
                    <input type="text" name="hire_cost" placeholder="Hire Cost" required>
                </div>
                <br>
                <div>
                    <input type="text" name="capacity" placeholder="Capacity" required>
                </div>
                <br>
                <div>
                    <input type="text" name="year" placeholder="Year" required>
                </div>
                <br>
                <div>
                    <input type="text" name="color" placeholder="Color" required>
                </div>
                <br>
                <div>
                    <input type="text" name="chassis" placeholder="Chassis" required>
                </div>
                <br>
                <br>
                <div>
                    <input type="submit" name="save" value="Submit">
                </div>
            </form>
            
            <?php 
            if(isset($_POST['save'])){
								
                $target = "../cars/".basename($_FILES['image']['name']);
                $image = $_FILES['image']['name'];

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    echo "File is valid, and was successfully uploaded";

                } else {
                    echo "Unsuccessful";
                }

                $car_name = $_POST['car_name'];
                $car_type = $_POST['car_type'];
                $hire_cost = $_POST['hire_cost'];
                $capacity = $_POST['capacity'];
                $year = $_POST['year'];
                $color = $_POST['color'];
                $chassis = $_POST['chassis'];
                

                
                
                $qr = "INSERT INTO cars (car_name, car_type, image, hire_cost, capacity, year, color, chassis, status) 
                VALUES ('$car_name','$car_type', '$image', '$hire_cost', '$capacity', '$year', '$color', '$chassis', 'Available')";
                                                    
                $res = $conn->query($qr);
                if($res === TRUE){
                    echo "<script type = \"text/javascript\">
                            alert(\"Vehicle Succesfully Added\");
                            window.location = (\"vehicles.php\")
                            </script>";
                    }
                
            
            }
            ?>
            
        </div>
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <!-- <section class="products">
        <div class="section-title">
            <h2></h2>
        </div>
        <div class="products-center"> -->
            
            <!-- single product -->
            <!-- <article class="product">
            
            </article> -->
            <!-- end of single product -->
            
        <!-- </div>
    </section> -->
    <!-- end of products -->
    
    <script src="../js/app.js"></script>
    <script src="../js/jquery.js"></script>
</body>
</html>