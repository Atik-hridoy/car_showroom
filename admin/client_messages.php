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
            <h1 class="banner-title">Client Messages</h1>
            <form action="" method="post">
                <div>
                    <select name="sortMsg" class="option-btn">
                        <option>Sort Messages</option>
                        <option value="client_id">Client ID</option>
                        <option value="time">Time</option>
                    </select>
                    <select name="sortType" class="option-btn">
                        <option>Type</option>
                        <option value="">Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="sort" value="Sort">
                </div>
            </form>
        </div>
        
        <?php 
        if(isset($_POST['sort'])){
            include '../includes/config.php';
            
            
			$selected_value = $_POST['sortMsg'];				
			$selected_value_type = $_POST['sortType'];				
            
            $qry = "SELECT * FROM message ORDER BY $selected_value $selected_value_type";
            $rsl = $conn->query($qry);
            $num = $rsl->num_rows;
            
            
            if($num > 0){            
        ?>
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Messages</h2>
        </div>
        <div class="products-center">
            
            <!-- single product -->
            <article class="product">
            <?php
                
                                   
                while($rws = $rsl->fetch_assoc()){
            ?>   
                <h4>Message ID: <?php echo $rws['msg_id'];?></h4>            
                <h4>Client ID: <?php echo $rws['client_id'];?></h4>            
                <h3>Message: <h4><?php echo $rws['message'];?></h4></h3>
                <h3>Time: <?php echo $rws['time'];?></h3>               
                
                
                <a href='delete_msg.php?id=<?php echo $rws['msg_id'];?>'>
                    <input type="submit" name="delete" value="Delete">
                </a><br><br>
                               
            <?php
                }
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