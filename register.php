<?php include 'partials/header.php' ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Register</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
<!-- ?php

$nameErr=$mobileErr="";
if(isset($_POST['register']))
{

    $name=$_POST['name'];
    $mno=$_POST['mno'];
    $email=$_POST['email'];
    $passw=$_POST['passw'];
    if(!preg_match("/^[a-zA-Z-']*$/",$name))
    {
        $nameErr=" * Only letters and White Space allowed";
    }
    elseif(strlen($mno) !=10)
    {
        $mobileErr=" * only 10 number please";

    }
    else{
    $query="INSERT INTO `user`(`user_name`, `user_mno`, `user_email`, `user_passw`) VALUES ('$name','$mno','$email','$passw')";
    $result=mysqli_query($conn,$query);

    if($result)
    {
        echo "<script>alert('Registration Successful');</script>";
        ?>
            <meta http-equiv="refresh" content="0; url = http://localhost/One-Sound/login.php" />
            ?php
    }
    else
    {
        echo "<script>alert('Registration Failed');</script>";
    }
}
}

?> -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Hi! User</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputUserName">UserName</label>
                                    <input type="text" class="form-control" id="exampleInputUserName"
                                        aria-describedby="emailHelp" placeholder="Enter User Name" name="name" required>
                                        <!-- <Span class="errormsg">?php echo "$nameErr";?></Span> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobileNumber">Mobile Number</label>
                                    <input type="number" class="form-control" id="exampleInputMobileNumber"
                                        placeholder="Enter Number" name="mno" required>
                                        <!-- <Span class="errormsg">?php echo "$mobileErr";?></Span> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter E-mail" name="email" required>
                                    <small id="emailHelp" class="form-text text-muted"><i
                                            class="fa fa-lock mr-2"></i>We'll never share your email with anyone
                                        else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password" name="passw" required>
                                </div>
                                <input type="submit" class="btn oneMusic-btn mt-30" name="register" value="Register">
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

    if(isset($_POST['register']))
    {

        $name=$_POST['name'];
        $mno=$_POST['mno'];
        $email=$_POST['email'];
        $passw=$_POST['passw'];

        $query="INSERT INTO `user`(`user_name`, `user_mno`, `user_email`, `user_passw`) VALUES ('$name','$mno','$email','$passw')";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            echo "<script>alert('Registration Successful');</script>";
            ?>
                <meta http-equiv="refresh" content="0; url = http://localhost/One-Sound/login.php" />
                <?php
        }
        else
        {
            echo "<script>alert('Registration Failed');</script>";
        }
    }

?>