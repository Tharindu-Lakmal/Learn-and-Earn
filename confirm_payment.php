<!-- database connection -->

<?php
    include('connection.php');
    session_start();

    if(isset($_GET['order_id'])) {
        $order_id=$_GET['order_id'];

        // echo $order_id;
        $select_data="Select * from user_orders where order_id=$order_id";
        $result=mysqli_query($con, $select_data);
        $row_fetch=mysqli_fetch_assoc($result);

        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];
    }

    if(isset($_POST['Confirm Payment'])) {
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];

        $insert_query="insert into 'user_payment' order_id, invoice_number, amount, payment_mode) 
        values ($order_id, $invoice_number, $amount, '$payment_mode')"; 
        
        $result=mysqli_query($con, $insert_query);
        if($result) {
            echo "<h4>Completed the payment successfully</h4>";
            echo "<script>window.open('profile.php?my_orders', '_self')</script>";
        }

        $update_orders="update user_orders set order_status='Complete' where order_id=$order_id";
        $result_orders=mysqli_query($con, $update_orders);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earn&Learn | Confirm Payment</title>

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
    <link rel="stylesheet" href="css/confirm_payment.css">

</head>
<body>

    <!-- Update form -->


    <div class="container">
        <h4 class="text-center mt-3">Confirm Payment</h4>

        <div class="form-container">
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">

                <!-- invoice number -->
                <div class="form-outline mb-4 m-auto">
                    <label for="invoice_number" class="form-label">
                        Invoice number
                    </label>
                    <input type="text" name="invoice_number" id="invoice_number" class="form-control" value="<?php echo $invoice_number?>">
                </div>

                <!-- amount -->
                <div class="form-outline mb-4 m-auto">
                    <label for="amount" class="form-label">
                    Amount
                    </label>
                    <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $amount_due?>">
                </div>

                <!-- select payment -->
                <div class="form-outline mb-4 m-auto">
                    
                    <select name="payment_mode" class="select_pay">
                        <option>Select Payment Mode</option>
                        <option>Bank Of Ceylon</option>
                        <option>National Serving Bank</option>
                        <option>Commercial Bank</option>
                        <option>Peoples' Bank</option>
                        <option>Sampath Bank</option>
                    </select>
                </div>

                <!-- p button -->
                <div class="form-outline mb-4 m-auto">
                    <input type="submit" name="Confirm Payment" class="btn0 btn-p" value="Confirm Payment">
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