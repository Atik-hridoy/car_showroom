<?php
    session_start();
    error_reporting("E-NOTICE");
?>
<div class="navbar-center" >
            <span class="nav-icon sidebar-toggle">
                <i class="fas fa-bars"></i>
            </span>
            <aside class="cart-overlay ">
                <div class="cart sidebar" >
                    <span class="close-cart">
                        <i class="fas fa-window-close"></i>
                    </span>
                    <h2>CarPod</h2>
                    <?php 
                        if(!$_SESSION['email'] && (!$_SESSION['pass'])){
                    ?>
                            <ul class="links cart-content" style="list-style-type: none;">
                                <li>
                                    <a href="signup.php">Register</a>
                                </li>
                                <li>
                                    <a href="account.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="login.php">Admin</a>
                                </li>
                            </ul>
                    <?php 
                        }else{
                    ?>
                            <ul class="links cart-content" style="list-style-type: none;">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="client_messages.php">Messages</a>
                                </li>
                                <li>
                                    <a href="client_requests.php">Requests</a>
                                </li>
                                <li>
                                    <a href="customer_info.php">Customer Info</a>
                                </li>
                                <li>
                                    <a href="vehicles.php">Vehicle Management</a>
                                </li>
                                <li>
                                    <a href="logout.php">Logout</a>
                                </li>
                            </ul>
                    <?php 
                        }
                    ?>
                </div>    
            </aside>
            
            <a href="index.php">
                <img src="../cars/logo.png" alt="store logo" class="img-logo">
            </a>
            
            <div class="cart-btn searchBtn">
                <form action="search_admin.php" method="post">
                    <span class="nav-icon">
                        <input type="text" name="search" placeholder="Search.." style="padding: 0; border: 0; background-color: inherit;">
                        <button type="submit" name="submit-search" style="font-size: 1.5rem;
                        cursor: pointer; position: relative;padding: 0; border: 0; background-color: inherit;"><i class="fas fa-search"></i></button>
                    </span>
                </form>
                
            </div>
        </div>