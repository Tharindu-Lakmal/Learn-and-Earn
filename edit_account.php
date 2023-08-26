<?php
    if(isset($_GET['edit_account'])) {
        $user_session_name=$_SESSION['username'];
        $select_query="Select * from user_table where username='$user_session_name'";
        $result_query=mysqli_query($con, $select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];
        // $user_image=$row_fetch['user_image'];
        $username=$row_fetch['username'];
        $user_email=$row_fetch['user_email'];
        $user_address=$row_fetch['user_address'];
        $user_mobile=$row_fetch['user_mobile'];
    }

    if(isset($_POST['user_update'])) {
        $update_id=$user_id;
        $username=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "user_images/$user_image");

        //update query
        $update_data="update user_table set username='$username', user_email='$user_email', 
        user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' where 
        user_id='$update_id'";
        $result_query_update=mysqli_query($con, $update_data);

        if($result_query_update) {
            echo "<script>alert('Date update successfuly')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn&Learn | Edit Account</title>

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
    <link rel="stylesheet" href="css/edit_account.css">

</head>
<body>

    <!-- Update form -->


    <div class="container">
        <h4 class="text-center mt-3">Edit Account</h4>

        <div class="form-container">
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">

                <!-- p title -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Enter Name" class="form-label">
                        Name
                    </label>
                    <input type="text" name="user_name" value="<?php echo $username?>" id="Enter Name" class="form-control" 
                    placeholder="Enter Name">
                </div>

                <!-- p description -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Enter Email" class="form-label">
                        Email
                    </label>
                    <input type="text" name="user_email" value="<?php echo $user_email?>" id="Enter Email" class="form-control" 
                    placeholder="Enter Email">
                </div>

                <!-- user image  -->
                <div class="form-outline mb-4 m-auto">
                    <label for="User_image" class="form-label-img">
                            Profile Picture
                        </label>
                    <div class="img d-flex">
                        <!-- <label for="User_image" class="form-label">
                            Profile Picture
                        </label> -->
                        <input type="file" name="user_image" id="User_image" class="form-control" required="required">
                        <img src="./user_images/<?php echo $user_image?>" alt="" class="profile_img">
                    </div>
                </div>

                <!-- user address -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Enter Address" class="form-label">
                        Address
                    </label>
                    <input type="text" name="user_address" value="<?php echo $user_address?>" id="Enter Address" class="form-control" 
                    placeholder="Enter Address">
                </div>

                <!-- user mobile -->
                <div class="form-outline mb-4 m-auto">
                    <label for="Enter mobile" class="form-label">
                        Contact
                    </label>
                    <input type="text" name="user_mobile" value="<?php echo $user_mobile?>" id="Enter mobile" class="form-control" 
                    placeholder="Enter Contact Number">
                </div>

                <!-- p button -->
                <div class="form-outline mb-4 m-auto">
                    <input type="submit" name="user_update" class="btn0 btn-p" value="Update">
                </div>

            </form>

        </div>
 
    </div>

    <!-- End update form -->
    
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>

</body>
</html>