<?php

// including connection file
include('connection.php');


// getting products----------------------------------------------------------------------------------------------------------------------------------
function getproducts() {
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])) {
        if(!isset($_GET['brand'])) {

            $select_query = "Select * from products order by rand() limit 0,5"; //limit 0,5
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];

            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo
                "<div class='col-md-4 mb-2 p-card'>
                    <div class='card' >
                        <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart= $product_id' class='btn btn-p'>Add to cart</a>
                            <a href='product_details.php?product_ID=$product_id' class='btn-v '>View more</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }

}

// getting products for selected category-----------------------------------------------------------------------------------------------------------------
function get_setect_category() {
    global $con;

    // condition to check isset or not
    if(isset($_GET['category'])) {

        $category_id = $_GET['category'];
        $select_query = "Select * from products where category_id = $category_id"; //limit 0,5
        $result_query = mysqli_query($con, $select_query);

        // count the num of rows resent in the database
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0) {
            echo "<h3 class='text-center'>No stock for this Category</h3>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];

        while($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo
            "<div class='col-md-4 mb-2 p-card'>
                <div class='card' >
                    <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price/-</p>
                      <a href='index.php?add_to_cart= $product_id' class='btn btn-p'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn-v '>View more</a>
                    </div>
                </div>
            </div>";
        }
    }

}

// getting products for selected brands---------------------------------------------------------------------------------------------------------------------
function get_setect_brand() {
    global $con;

    // condition to check isset or not
    if(isset($_GET['brand'])) {

        $brand_id = $_GET['brand'];
        $select_query = "Select * from products where brand_id = $brand_id"; //limit 0,5
        $result_query = mysqli_query($con, $select_query);

        // count the num of rows resent in the database
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows == 0) {
            echo "<h3 class='text-center'>No stock for this Brand</h3>";
        }
        // $row = mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];

        while($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            echo
            "<div class='col-md-4 mb-2 p-card'>
                <div class='card' >
                    <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price: $product_price/-</p>
                        <a href='index.php?add_to_cart= $product_id' class='btn btn-p'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn-v '>View more</a>
                    </div>
                </div>
            </div>";
        }
    }

}

// display brands---------------------------------------------------------------------------------------------------------------------------------------------
function getbrands() {
    global $con;

    $select_brand = "select * from brand";
    $result_brand = mysqli_query($con, $select_brand);
    // $row_data = mysqli_fetch_assoc($result_brand);
    // echo $row_data['brand_name'];

    while($row_data = mysqli_fetch_assoc($result_brand)) {

        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo "
            <li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link b'>$brand_title</a>
            </li>
        ";
    }
}

// display categories---------------------------------------------------------------------------------------------------------------------------------------
function getcategory() {
    global $con;

    $select_category = "select * from categories";
    $result_category = mysqli_query($con, $select_category);
    // $row_data = mysqli_fetch_assoc($result_category);
    // echo $row_data['category_name'];

    while($row_data = mysqli_fetch_assoc($result_category)) {

        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];

        echo "
            <li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link b'>$category_title</a>
            </li>
        ";
    }
}


// get serching products-------------------------------------------------------------------------------------------------------------------------------------
function search_product() {
    global $con;

    // condition to check isset or not
    if(isset($_GET['search_data_product'])) {

        $search_data_value = $_GET['search_data'];

            $search_query = "Select * from products where product_keywords like '%$search_data_value%'"; //limit 0,5
            $result_query = mysqli_query($con, $search_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];

            // count the num of rows resent in the database
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows == 0) {
                echo "<h3 class='text-center'>No matching search results</h3>";
            }

            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo
                "<div class='col-md-4 mb-2 p-card'>
                    <div class='card' >
                        <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                             <a href='index.php?add_to_cart= $product_id' class='btn btn-p'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn-v '>View more</a>
                        </div>
                    </div>
                </div>";
            }
        
    }
}

// display all products----------------------------------------------------------------------------------------------------------------------------------------
function get_all_products() {
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])) {
        if(!isset($_GET['brand'])) {

            $select_query = "Select * from products order by rand()"; //limit 0,5
            $result_query = mysqli_query($con, $select_query);
            // $row = mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];

            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                echo
                "<div class='col-md-4 mb-2 p-card'>
                    <div class='card' >
                        <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                             <a href='index.php?add_to_cart= $product_id' class='btn btn-p'>Add to cart</a>
                            <a href='index.php' class='btn-v '>View more</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }

}

// view more details----------------------------------------------------------------------------------------------------------------------------------------------------------------
function view_details() {
    global $con;

    // condition to check isset or not
    if(isset($_GET['product_id'])) {
        if(!isset($_GET['category'])) {
            if(!isset($_GET['brand'])) {
                
                $product_id = $_GET['product_id'];
                $select_query = "Select * from products where product_id = $product_id"; //limit 0,5
                $result_query = mysqli_query($con, $select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
    
                while($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
    
                    echo
                    "<div class='col-md-4 mb-2 p-card'>
                        <div class='card' >
                            <img src='./product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price/-</p>
                                 <a href='index.php?add_to_cart= $product_id' class='btn btn-p'>Add to cart</a> 
                                <a href='index.php' class='btn-v '>Back to home</a>
                            </div>
                        </div>
                    </div>
                    
                    
                        <div class='col-md-8'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <img src='./product_images/$product_image2' class='card-img-top' alt='$product_title'>
                                </div>
                                <div class='col-md-4'>
                                    <img src='./product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                </div>
                            </div>
                        </div>";
                }
            }
        }
    }

}





//***************************************************************
//get the ip address

function getIPAddress() {
    //whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
//whether ip is from the remote address
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//$ip = getIPAddress();
//echo 'User Real IP Address - '.$ip;



//*****cart function
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_add = getIPAddress();
            $get_product_id = $_GET['add_to_cart'];
            $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add' AND product_id =  $get_product_id";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if($num_of_rows > 0) {
                echo "<script>alert('This Item is already present inside the cart')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }else{
                $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 0)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item is added to cart')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }

        }
    }


//get cart item numbers

function cart_item(){
    if(isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    }else{
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);

    }
    echo $count_cart_item;

}

//Total price function
function total_cart_price(){
    global $con;
    $total_price=0;
//    first choose record, related to the ip address
    $get_ip_add = getIPAddress();
    $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
//    next find all product related to the product id in product table
    while ($row = mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $select_product = "SELECT * FROM products WHERE product_id = $product_id";
        $result_products = mysqli_query($con, $select_product);
//        next find all prices for related product
        while ($row_product = mysqli_fetch_array($result_products)){
            $product_price = array($row_product['product_price']);  /*[200,300]*/
            $product_values = array_sum($product_price);   /*  [500]  */
            $total_price += $product_values;


        }
    }
    echo $total_price;
}


//get user order details
function get_user_order_details() {
    global $con;
    $username=$_SESSION['username'];
    $get_details=$user_image="Select * from user_table where username='$username'";
    $result_query=mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query)) {
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])) {
            if(!isset($_GET['my_orders'])) {
                if(!isset($_GET['delete_account'])) {
                    $get_orders="Select * from user_orders where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con, $get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0) {
                        echo "<h4 class='text-center'>You have <span class='text-danger'>$row_count</span> pending orders</h4>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }
                    else {
                        echo "<h4 class='text-center'>You have zero pending orders</h4>
                        <p class='text-center'><a href='index.php' class='text-dark'>Explore products</a></p>";
                    }
                }
            }
        }
    }
}

function footer() {
    echo "<div class='footer'>
    <div class='container pt-5'>
        <div class='row' style='margin-bottom: 50px;'>
            <div class='col-md-3 help-center footer-h'>
                <h4>HELP CENTER</h4>
                <ul class='footer-ul'>
                    <li><a href='#'>How to Pay</a></li>
                    <li><a href='#'>FAQ’S</a></li>
                    <li><a href='#'>Delivery info</a></li>
                </ul>
            </div>
            <div class='col-md-3 customer-info footer-h'>
                <h4>CUSTOMER INFORMATION</h4>
                <ul class='footer-ul'>
                    <li><a href='#'>About Us</a></li>
                    <li><a href='#'>FAQ’S</a></li>
                    <li><a href='#'>Contact Us</a></li>
                    <li><a href='#'>Sell Your Items</a></li>
                </ul>
            </div>
            <div class='col-md-3 security footer-h'>
                <h4>SECURITY & PRIVACY</h4>
                <ul class='footer-ul'>
                    <li><a href='#'>Terms of Use</a></li>
                    <li><a href='#'>Privacy Policy</a></li>
                    <li><a href='#'>Return/ Refund Policy</a></li>
                    <li><a href='#'>Store Location</a></li>
                </ul>
            </div>
            <div class='col-md-3 contact footer-h'>
                <h4>CONTACT</h4>
                <ul class='footer-ul'>
                    <li><i class='fa-solid fa-phone' style='color: #000000;'></i><a href='#'>Phone: (+94) 443456333</a></li>
                    <li><i class='fa-solid fa-envelope' style='color: #000000;'></i><a href='#'>Email: learnandearn@mail.com</a></li>
                    <li><i class='fa-brands fa-instagram' style='color: #000000;'></i><a href='#'>Instagram</a></li>
                    <li><i class='fa-brands fa-facebook' style='color: #000000;'></i><a href='#'>Facebook</a></li>
                    <li><i class='fa-brands fa-youtube' style='color: #000000;'></i><a href='#'>Youtube</a></li>
                    <li><i class='fa-brands fa-twitter' style='color: #000000;'></i><a href='#'>Twitter</a></li>
                </ul>
            </div>
        </div>

        <div class='row text-center'>
            <p style='color: black'>All rights reserved <i class='fa-regular fa-copyright' style='color: #000000;'></i> - Designed by Team 6 | Learn&Earn - 2023</p>
        </div>
    </div>
    </div>
    ";
}
?>