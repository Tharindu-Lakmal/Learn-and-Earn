<!-- database connection -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>

    <link rel="icon" href="Image/logo.png" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;700&display=swap" rel="stylesheet">

    <!-- CSS link -->
    <link rel="stylesheet" href="css/delete_account.css">

</head>
<!-- <style>
    body{
        overflow-x:hidden;
    }
</style> -->

<body>
        
    <h4 class="text-center pt-3">Delete Account</h4>

    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4 m-auto">
            <input type="submit" class="form-control m-auto btn0 btn-p text-center" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4 m-auto">
            <input type="submit" class="form-control m-auto btn0 btn-pp" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>

</body>
</html>

<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])) {
    $delete_query="Delete from user_table where username='$username_session'";
    $result=mysqli_query($con, $delete_query);
    
    if($result) {
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }   
}

if(isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php', '_self')</script>";
}
?>