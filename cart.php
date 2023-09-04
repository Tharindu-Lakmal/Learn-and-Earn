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
    <title>Earn&Learn | Cart Details</title>

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
    <link rel="stylesheet" href="css/cart.css">

</head>
<body>
        
    <div class="container1">
        <div class="container-fluid p-0">

            <!-- first child -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <img src="Image/big_logo.png" alt="" class="logo">
                    

                    <!-- second child -->
                    <nav style="color:white">
                        <ul class="welcome">
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
                                /*if(!isset($_SESSION['username'])){
                                    echo "  <li>
                                        <a class='btn-login' href='user_login.php'>Login</a>
                                    </li>";
                                    
                                }
                                else{
                                    echo " <li>
                                    <a class='btn-login' href='user_logout.php'>Logout</a>
                                </li>";

                                } */              
                                ?>
                        </ul>
                    </nav>
                </div>
            </nav>
            <!-- end first child -->

<!--            ******calling cart function  -->

            <?php
                cart();
            ?>
        
    </div>

        <div class="products">
            <!-- third child -->
            <h3 class="text-center mt-4" style="color: black;">My Cart</h3>
            <!-- enf of third child -->

            <!-- fourth child table -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                    <table class="table table-bordered text-center table-dark tab_bg">
                        

<!-- "php code display dynamic data -->
                        <?php 
                        
                            global $con;
                            $total_price=0;
                         //    first choose record, related to the ip address
                            $get_ip_add = getIPAddress();
                            $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if($result_count>0){
                            echo "<thead>
                            <tr class='border-3'>
                                <th>Title</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operation</th>
                            </tr>
                        </thead>
                        <tbody>";
                            
                          
                        //    next find all product related to the product id in product table
                            while ($row = mysqli_fetch_array($result)){
                                $product_id = $row['product_id'];
                                $select_product = "SELECT * FROM products WHERE product_id = $product_id";
                                $result_products = mysqli_query($con, $select_product);
                        //        next find all prices for related product
                                while ($row_product = mysqli_fetch_array($result_products)){
                                    $product_price = array($row_product['product_price']);  /*[200,300]*/
                                    // get relevent data to the variable for display in table
                                    $price_table = $row_product['product_price'];
                                    $product_title = $row_product['product_title'];
                                    $product_image1 = $row_product['product_image1'];
                                    $product_values = array_sum($product_price);   /*  [500]  */
                                    $total_price += $product_values;
                        
    
                        ?>
                            <tr class="border-3">
                                <td><?php echo $product_title ?></td>
                                <td><img src="image\<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                <td><input type="text" name="qty" class="form-input w-50"></td>
                               <!-- php code for update quantity -->
                               <?php 
                               global $con;
                                 $get_ip_add = getIPAddress();
                                 if(isset($_POST['update_cart'])){
                                    $quantities = $_POST['qty'];
                                    $update_cart = "UPDATE cart_details SET quantity = $quantities WHERE ip_address = '$get_ip_add'";
                                    $result_quantity = mysqli_query($con, $update_cart);
                                    $total_price = $total_price*$quantities;
                                 }

                                ?>
                                <td><?php echo $price_table ?></td>
                                <td><input type="checkbox" name="removeItem[]" value="<?php echo $product_id; ?>"></td>
                                <td>
                                    <!-- <button class="n-link">Update</button> -->
                                    <input type="submit" value="Update Cart" class="btn-2" name="update_cart">
                                    <!-- <button class="n-link">Remove</button> -->
                                    <input type="submit" value="Remove Cart" class="btn-2" name="remove_cart">
                                </td>
                            </tr>
                            <?php
                            }  
                            }
                            }else{
                                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                            }
                            ?>

                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                            <?php
                             global $con;
                          //    first choose record, related to the ip address
                             $get_ip_add = getIPAddress();
                             $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
                             $result = mysqli_query($con, $cart_query);
                             $result_count = mysqli_num_rows($result);
                             if($result_count>0){
                                echo "<h5>Subtotal: <strong style='font-weight:400'>$total_price/-</strong></h5>
                                <input type='submit' value='Continue Shopping' class='btn-shopping' name='continue_shopping'>
                               <button class='btn-2'><a href='checkout.php' class='btn-2'>Checkout</a></button>";
                             }else{
                                echo "  <input type='submit' value='Continue Shopping' class='n-link' name='continue_shopping'>";
                             }

                             if(isset($_POST['continue_shopping'])){
                                echo "<script>window.open('index.php','_self')</script>";
                             }
                            ?>

                        

                    </div>
                    </form>

                    <!-- Remove item function -->
                    <?php
                    function remove_cart_item(){
                        global $con;
                        if(isset($_POST['remove_cart'])){
                            foreach($_POST['removeItem'] as $remove_id){
                                echo $remove_id;
                                $delete_query = "DELETE FROM cart_details WHERE product_id=$remove_id";
                                $run_delete = mysqli_query($con, $delete_query);
                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                }
                            }
                        }
                    }
                    echo $remove_item = remove_cart_item();
                    
                    ?>

                </div>
            </div>
           
            <!-- end of fourth child -->
        </div>

        <?php
         footer();
        ?>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>