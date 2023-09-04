<!-- database connection -->

<?php
    include('connection.php');
    include('functions/common_function.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn&Learn | User Profile</title>

    <link rel="icon" href="Image/logo.png" />

    <!-- Bootstrap link path-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">

    <!-- CSS link -->
    <link rel="stylesheet" href="css/profile.css">

</head>
<style>
    body{
        overflow-x:hidden;
    }
</style>

<body>
        
    <div class="container1">
        <div class="container-fluid p-0">

            <!-- first child -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <img src="Image/big_logo.png" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="n-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="n-link" href="all_products.php">Products</a>
                            </li>
                            <li class="nav-item">
                            <a class="n-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                            <a class="cart" href="cart.php"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #00dd00;"></i><sup><?php cart_item(); ?></sup></a>
                            </li>
                            <li class="nav-item">
                            <a class="tprice" href="#">Total Price:<?php total_cart_price() ?>/-</a>
                            </li>
                        </ul>
                        <!-- <form class="d-flex" role="search" action="search_product.php" mehtod="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                                 <button class="btn btn-outline-success" type="submit">Search</button>

                             <input type="submit" value="Search" class="btn" name="search_data_product">

                        </form> -->
                    </div>
                </div>
            </nav>
            <!-- end first child -->

<!--            ******calling cart function  -->

            <?php
            cart();

            ?>

            <!-- second child -->
            <div class="container2">
            <div class="heading-sub">
                    <ul>
                        <li><p>Welcome 
                        <?php 
                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }
                        else{
                            echo "guest"; 
                        } 
                        ?>
                        <?php
                        if(!isset($_SESSION['username'])){
                            echo "  <li>
                                <a class='btn-login' href='user_login.php'>Login</a>
                            </li>";
                            
                        }
                        else{
                            echo " <li>
                            <a class='btn-login' href='user_logout.php'>Logout</a>
                        </li>";

                        }               
                    ?>
                    </ul>
                </div>
                <div class="heading">
                    <h1>Student-Made Marketplace</h1>
                    <p>Where Student Talent Shines, and Dreams Become Sales!</p>
                </div>
            </div>
            <!-- end of second child -->
        </div>
    </div> 
    
    <!-- user area -->
    <div class="row">
         <div class="col-md-3 p-10">
            <div class="ul-list m-5">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                    </li>
                    <?php
                        $username=$_SESSION['username'];
                        $user_image="Select * from user_table where username='$username'";
                        $user_image=mysqli_query($con, $user_image);
                        $row_image=mysqli_fetch_array($user_image);
                        $user_image=$row_image['user_image'];
                        echo "<li class='nav-item'>
                        <img src='user_images/$user_image' class='profile_img' alt=''>
                        </li>"
                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="user_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
         </div> 
         <div class="col-md-9">
            <?php
                get_user_order_details();

                if(isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if(isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
            ?>
         </div>                
    </div>
    <!-- end of user area -->

    <?php
        footer();
    ?>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>