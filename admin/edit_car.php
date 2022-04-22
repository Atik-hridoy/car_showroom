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
        $id = $_GET['id'];
        $car_name = $_GET['name'];
        
        include '../includes/config.php';
        $query = "SELECT * FROM cars WHERE car_id = '$id'";
        $rs = $conn->query($query);
        
        while($row = $rs->fetch_assoc()){
            $car_name = $row['car_name'];
            $car_type = $row['car_type'];
            $image = $row['image'];
            $hire_cost = $row['hire_cost'];
            $capacity = $row['capacity'];
            $year = $row['year'];
            $color = $row['color'];
            $chassis = $row['chassis'];
            $status = $row['status'];
        }
        include 'menu.php'?>
    </nav>
    <!-- end of navbar -->
    
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <form method="post" enctype="multipart/form-data">
                <h1 class="banner-title">Edit <?php echo $car_name?></h1>
                <div>
                    <h3>Name</h3> <input type="text" name="car_name" value="<?php echo $car_name?>" required>
                </div>
                <br>
                <div>
                    <h3>Manufacturer</h3> <input type="text" name="car_type" value="<?php echo $car_type?>" required>
                </div>
                <br>
                <div>
                   <h3>Image</h3> <input type="file" name="image" required>
                </div>
                <br>
                <div>
                    <h3>Hire Cost</h3> <input type="text" name="hire_cost" value="<?php echo $hire_cost?>" required>
                </div>
                <br>
                <div>
                    <h3>Capacity</h3> <input type="text" name="capacity" value="<?php echo $capacity?>" required>
                </div>
                <br>
                <div>
                    <h3>Year</h3> <input type="text" name="year" value="<?php echo $year?>" required>
                </div>
                <br>
                <div>
                    <h3>Color</h3> <input type="text" name="color" value="<?php echo $color?>" required>
                </div>
                <br>
                <div>
                    <h3>Chassis</h3> <input type="text" name="chassis" value="<?php echo $chassis?>" required>
                </div>
                <br>
                <div>
                    <h3>Status</h3> <input type="text" name="status" value="<?php echo $status?>" required>
                </div>
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
                $status = $_POST['status'];

                $qr = "UPDATE cars SET car_name = '$car_name', car_type= '$car_type', image='$image', hire_cost='$hire_cost', capacity='$capacity', year='$year', color='$color', chassis='$chassis', status='$status' WHERE car_id = '$id'";
                $res = $conn->query($qr);
                if($res === TRUE){
                    echo "<script type = \"text/javascript\">
                            alert(\"Vehicle Succesfully updated\");
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