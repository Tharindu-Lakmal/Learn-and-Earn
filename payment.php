<?php 
include('connection.php');
include('functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    /* Move styles to an external CSS file for better separation of concerns */
    .payy {
        width: 450px;
        height: 350px;
        background-color: #D3D2D2;
        border-radius: 30px;
        text-align: center;
        padding-top: 100px;
        padding-left: 100px;
        margin-left: 100px;
        margin-top: 15px;
        margin-left: 0;
    }
    .payy p {
        margin-top: 50px;
        margin-left: 20px;
    }
    .pn {
        background-color: #FF3333;
        opacity: 0.7;
        border-radius: 50px;
        width: 60%;
        padding: 5px 20px;
        
    }
    p {
        color: #ffffff;
    }
    h2{
        margin-top: 100px;
    }
    .pn:hover {
        background-color: red;
        color: #ffffff;
    }
    img {
        width: 500px;
        height: auto;
        margin-left: 100px;
        margin-bottom: 50px;
        display: block;
    }

    .pay_bo {
        margin-top: 5px;
        margin-left: 20px;
        margin-bottom: 20px;
    }
    a{
        margin-top: 100px;
    }
</style>
<body>
    <?php 
    // Consider placing this database query code at the top before any HTML output
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM user_table WHERE user_ip = '$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>

    <h2 class="text-center text-dark pap px-0"><b>Payment</b></h2>
    <div class="row d-flex justify-content-center align-items-center pay_bo"> <!-- Fixed typo: justify-content-cnter to justify-content-center -->
        <div class="col-md-6 pa">
            <a href="https://www.paypal.com/lk/home"><img src="image/pay.png" alt=""></a>
        </div>
        <div class="col-md-6 payy">
            <a href="order.php?user_id=<?php echo $user_id; ?>" class="text-decoration-none"><p class="text-center pn">Pay Now</p></a>
        </div>
    </div>
</body>
</html>
