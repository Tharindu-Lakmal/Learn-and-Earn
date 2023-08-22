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
                            <a href='#' class='btn btn-p'>Add to cart</a>
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
                        <a href='#' class='btn btn-p'>Add to cart</a>
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
                        <a href='#' class='btn btn-p'>Add to cart</a>
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
                echo "<h3 class='text-center'>No matching serch results</h3>";
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
                            <a href='#' class='btn btn-p'>Add to cart</a>
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
                            <a href='#' class='btn btn-p'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn-v '>View more</a>
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
                                <a href='#' class='btn btn-p'>Add to cart</a>
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
?>