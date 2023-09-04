<div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>

    <div class="row d-flex align-item-center justify-content-center">
        <div class="col-lg-12 col-xl-6 ">
            <form action="" method="post" enctype="multipart/form-data">

                <!--               username field-->
                <div class="form-outline mb-3">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control"
                        placeholder="Enter Your Username" autocomplete="off" required name="user_username"/>
                </div>

<!--                email field-->
                <div class="form-outline mb-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="text" id="user_email" class="form-control"
                           placeholder="Enter Your Email" autocomplete="off" required name="user_email"/>
                </div>

<!--                Image field-->
                <div class="form-outline mb-3">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control"
                           required name="user_image"/>
                </div>

                <!--                Password field-->
                <div class="form-outline mb-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control"
                           placeholder="Enter Your Password" autocomplete="off" required name="user_password"/>
                </div>

                <!--                Confirm password field-->
                <div class="form-outline mb-3">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control"
                           placeholder="Confirm Password" autocomplete="off" required name="conf_user_password"/>
                </div>

                <!--               user address field-->
                <div class="form-outline mb-3">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control"
                           placeholder="Enter Your Address" autocomplete="off" required name="user_address"/>
                </div>

                <!--               Contact field-->
                <div class="form-outline mb-3">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control"
                           placeholder="Enter Your mobile number" autocomplete="off" required name="user_contact"/>
                </div>

                <div class="mt-3 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>

            </form>
        </div>
    </div>
</div>