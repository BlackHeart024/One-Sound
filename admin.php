<?php include 'partials/header.php' ?>
<?php
session_start();
?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Admin-Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back Admin</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail" name="email">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>
                                
                                <input type="submit" class="btn oneMusic-btn mt-30" name="login" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->

<?php include 'partials/footer.php' ?>

<?php

    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $passw=$_POST['password'];
        $query="SELECT `admin_email`, `admin_passw` FROM `admin` WHERE admin_email='$email' AND admin_passw='$passw';";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $data = mysqli_num_rows($result);
            if($data >= 1)
            {
                $_SESSION['admin_login'] = $email;
                ?>
                <meta http-equiv="refresh" content="0; url = http://localhost/One-Sound/admin/dashboard.php" />
                <?php
            }
            else
            {
                echo "<script>alert('Incorrect');</script>";
            }
        }
    }

?>